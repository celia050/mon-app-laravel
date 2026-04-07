<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Chapitre;
use App\Models\SousChapitre;
use Illuminate\Http\Request;

class SousChapitreController extends Controller
{
    public function create(Chapitre $chapitre) {
        return view('admin.sous-chapitres.create', compact('chapitre'));
    }
    public function store(Request $request, Chapitre $chapitre) {
        $request->validate(['titre' => 'required|string|max:255']);
        SousChapitre::create([
            'titre' => $request->titre,
            'contenu' => $request->contenu,
            'chapitre_id' => $chapitre->id,
        ]);
        return redirect()->route('admin.formations.chapitres.show', [$chapitre->formation, $chapitre])->with('success', 'Sous-chapitre créé !');
    }
    public function show(Chapitre $chapitre, SousChapitre $sousChapitre) {
        return view('admin.sous-chapitres.show', compact('chapitre', 'sousChapitre'));
    }
    public function edit(Chapitre $chapitre, SousChapitre $sousChapitre) {
        return view('admin.sous-chapitres.edit', compact('chapitre', 'sousChapitre'));
    }
    public function update(Request $request, Chapitre $chapitre, SousChapitre $sousChapitre) {
        $sousChapitre->update($request->all());
        return redirect()->route('admin.chapitres.sous-chapitres.show', [$chapitre, $sousChapitre])->with('success', 'Modifié !');
    }
    public function destroy(Chapitre $chapitre, SousChapitre $sousChapitre) {
        $sousChapitre->delete();
        return redirect()->route('admin.formations.chapitres.show', [$chapitre->formation, $chapitre])->with('success', 'Supprimé !');
    }
}