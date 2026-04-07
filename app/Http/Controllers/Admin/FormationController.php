<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Formation;
use App\Models\User;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    public function index() {
        $formations = Formation::all();
        return view('admin.formations.index', compact('formations'));
    }

    public function create() {
        return view('admin.formations.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nom' => 'required|string|max:255',
            'niveau' => 'required|string',
        ]);
        Formation::create($request->all());
        return redirect()->route('admin.formations.index')->with('success', 'Formation créée !');
    }

    public function show(Formation $formation) {
        $apprenants = User::where('role', 'apprenant')->get();
        return view('admin.formations.show', compact('formation', 'apprenants'));
    }

    public function edit(Formation $formation) {
        return view('admin.formations.edit', compact('formation'));
    }

    public function update(Request $request, Formation $formation) {
        $request->validate(['nom' => 'required|string|max:255']);
        $formation->update($request->all());
        return redirect()->route('admin.formations.index')->with('success', 'Formation modifiée !');
    }

    public function destroy(Formation $formation) {
        $formation->delete();
        return redirect()->route('admin.formations.index')->with('success', 'Formation supprimée !');
    }

    public function ajouterApprenant(Request $request, Formation $formation) {
        $formation->apprenants()->syncWithoutDetaching([$request->user_id]);
        return redirect()->back()->with('success', 'Apprenant ajouté !');
    }

    public function retirerApprenant(Formation $formation, User $user) {
        $formation->apprenants()->detach($user->id);
        return redirect()->back()->with('success', 'Apprenant retiré !');
    }
}