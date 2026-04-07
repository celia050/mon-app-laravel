<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\Resultat;
use App\Models\SousChapitre;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function create() {
        return view('admin.quiz.create');
    }
    public function store(Request $request) {
        $request->validate(['titre' => 'required', 'sous_chapitre_id' => 'required']);
        $quiz = Quiz::create($request->all());
        return redirect()->route('admin.quiz.show', $quiz)->with('success', 'Quiz créé !');
    }
    public function show(Quiz $quiz) {
        return view('admin.quiz.show', compact('quiz'));
    }
    public function edit(Quiz $quiz) {
        return view('admin.quiz.edit', compact('quiz'));
    }
    public function update(Request $request, Quiz $quiz) {
        $quiz->update($request->all());
        return redirect()->route('admin.quiz.show', $quiz)->with('success', 'Quiz modifié !');
    }
    public function destroy(Quiz $quiz) {
        $quiz->delete();
        return redirect()->back()->with('success', 'Quiz supprimé !');
    }
    // Côté apprenant
    public function showQuiz(Quiz $quiz) {
        return view('apprenant.quiz', compact('quiz'));
    }
    public function soumettre(Request $request, Quiz $quiz) {
        $questions = $quiz->questions()->with('reponses')->get();
        $score = 0;
        foreach ($questions as $question) {
            $reponseChoisieId = $request->input('reponses.' . $question->id);
            $bonneReponse = $question->reponses->firstWhere('est_correcte', true);
            if ($bonneReponse && $reponseChoisieId == $bonneReponse->id) {
                $score++;
            }
        }
        Resultat::create([
            'user_id' => auth()->id(),
            'quiz_id' => $quiz->id,
            'score' => $score,
            'total' => $questions->count(),
        ]);
        return redirect()->route('quiz.show', $quiz)->with('success', "Score : $score / {$questions->count()} 🎉");
    }
}