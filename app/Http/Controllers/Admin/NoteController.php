<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Formation;
use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index() {
        $notes = Note::with(['user', 'formation'])->get();
        return view('admin.notes.index', compact('notes'));
    }
    public function create() {
        $apprenants = User::where('role', 'apprenant')->get();
        $formations = Formation::all();
        return view('admin.notes.create', compact('apprenants', 'formations'));
    }
    public function store(Request $request) {
        $request->validate(['user_id'=>'required','formation_id'=>'required','matiere'=>'required','note'=>'required|numeric|min:0|max:20']);
        Note::create($request->all());
        return redirect()->route('admin.notes.index')->with('success', 'Note ajoutée !');
    }
    public function edit(Note $note) {
        return view('admin.notes.edit', compact('note'));
    }
    public function update(Request $request, Note $note) {
        $note->update($request->all());
        return redirect()->route('admin.notes.index')->with('success', 'Note modifiée !');
    }
    public function destroy(Note $note) {
        $note->delete();
        return redirect()->route('admin.notes.index')->with('success', 'Note supprimée !');
    }
}