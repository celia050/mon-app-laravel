<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chapitre;
use App\Models\Formation;
use Illuminate\Http\Request;

class ChapitreController extends Controller
{
    public function create(Formation $formation) {
        return view('admin.chapitres.create', compact('formation'));
    }

    public function store(Request $request, Formation $formation) {
        $request->validate(['titre' => 'required|string|max:255']);
        Chapitre::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'formation_id' => $formation->id,
        ]);
        return redirect()->route('admin.formations.show', $formation)->with('success', 'Chapitre créé !');
    }

    public function show(Formation $formation, Chapitre $chapitre) {
        return view('admin.chapitres.show', compact('formation', 'chapitre'));
    }

    public function edit(Formation $formation, Chapitre $chapitre) {
        return view('admin.chapitres.edit', compact('formation', 'chapitre'));
    }

    public function update(Request $request, Formation $formation, Chapitre $chapitre) {
        $request->validate(['titre' => 'required|string|max:255']);
        $chapitre->update($request->all());
        return redirect()->route('admin.formations.show', $formation)->with('success', 'Chapitre modifié !');
    }

    public function destroy(Formation $formation, Chapitre $chapitre) {
        $chapitre->delete();
        return redirect()->route('admin.formations.show', $formation)->with('success', 'Chapitre supprimé !');
    }
}