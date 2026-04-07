@extends('layouts.app')
@section('content')
    <h2>Nouveau sous-chapitre</h2>
    <form method="POST" action="{{ route('admin.chapitres.sous-chapitres.store', $chapitre) }}">
        @csrf
        <div class="mb-3">
            <label>Titre</label>
            <input type="text" name="titre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Contenu</label>
            <textarea name="contenu" class="form-control" rows="6"></textarea>
        </div>
        <button class="btn btn-success">Créer</button>
        <a href="{{ route('admin.formations.chapitres.show', [$chapitre->formation, $chapitre]) }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection