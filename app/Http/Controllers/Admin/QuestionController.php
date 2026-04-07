<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Reponse;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create() {
        $quiz = Quiz::findOrFail(request('quiz_id'));
        return view('admin.questions.create', compact('quiz'));
    }
    public function store(Request $request) {
        $request->validate(['question' => 'required', 'quiz_id' => 'required']);
        $question = Question::create([
            'question' => $request->question,
            'quiz_id' => $request->quiz_id,
        ]);
        foreach ($request->reponses as $i => $texte) {
            if ($texte) {
                Reponse::create([
                    'texte' => $texte,
                    'est_correcte' => $i == $request->bonne_reponse,
                    'question_id' => $question->id,
                ]);
            }
        }
        return redirect()->route('admin.quiz.show', $request->quiz_id)->with('success', 'Question ajoutée !');
    }
    public function destroy(Question $question) {
        $quiz_id = $question->quiz_id;
        $question->delete();
        return redirect()->route('admin.quiz.show', $quiz_id)->with('success', 'Question supprimée !');
    }
}