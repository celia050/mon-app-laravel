<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\SousChapitre;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Reponse;

class OllamaController extends Controller
{
    public function form() {
        $sousChapitres = SousChapitre::with('chapitre.formation')->get();
        return view('admin.ollama.form', compact('sousChapitres'));
    }

    public function generate(Request $request) {
        $request->validate([
            'type' => 'required|in:contenu,quiz',
            'sujet' => 'required|string',
            'sous_chapitre_id' => 'nullable|exists:sous_chapitres,id',
        ]);

        if ($request->type === 'contenu') {
            $prompt = "Génère un contenu pédagogique structuré en HTML simple sur le sujet : {$request->sujet}. Inclure une introduction, 2-3 points clés et une conclusion. Réponds uniquement en HTML.";
        } else {
            $prompt = "Génère 10 questions QCM sur le sujet : {$request->sujet}. Réponds uniquement en JSON avec ce format exact sans aucun texte avant ou après : [{\"question\":\"...\",\"reponses\":[\"...\",\"...\",\"...\",\"...\"],\"bonne_reponse\":0}]";
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('GROQ_API_KEY'),
            'Content-Type' => 'application/json',
        ])->post('https://api.groq.com/openai/v1/chat/completions', [
            'model' => 'llama-3.3-70b-versatile',
            'messages' => [
                ['role' => 'user', 'content' => $prompt]
            ],
        ]);

        $contenu = $response->json('choices.0.message.content');

        if ($request->type === 'quiz' && $request->sous_chapitre_id) {
            try {
                $questions = json_decode($contenu, true);
                $sousChapitre = SousChapitre::find($request->sous_chapitre_id);
                $quiz = Quiz::create([
                    'titre' => 'Quiz - ' . $request->sujet,
                    'sous_chapitre_id' => $sousChapitre->id,
                ]);
                foreach ($questions as $q) {
                    $question = Question::create([
                        'question' => $q['question'],
                        'quiz_id' => $quiz->id,
                    ]);
                    foreach ($q['reponses'] as $i => $r) {
                        Reponse::create([
                            'texte' => $r,
                            'est_correcte' => $i === $q['bonne_reponse'],
                            'question_id' => $question->id,
                        ]);
                    }
                }
                return redirect()->route('admin.quiz.show', $quiz)->with('success', 'Quiz généré et enregistré !');
            } catch (\Exception $e) {
                return back()->with('error', 'Erreur lors de la génération : ' . $e->getMessage());
            }
        }

        return view('admin.ollama.resultat', compact('contenu', 'request'));
    }
}