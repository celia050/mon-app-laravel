@extends('layouts.app')
@section('content')
    <h2>Modifier le sous-chapitre</h2>
    <form method="POST" action="{{ route('admin.chapitres.sous-chapitres.update', [$chapitre, $sousChapitre]) }}">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Titre</label>
            <input type="text" name="titre" class="form-control" value="{{ $sousChapitre->titre }}" required>
        </div>
        <div class="mb-3">
            <label>Contenu</label>
            <textarea name="contenu" class="form-control" rows="6">{{ $sousChapitre->contenu }}</textarea>
        </div>
        <button class="btn btn-warning">Modifier</button>
        <a href="{{ route('admin.chapitres.sous-chapitres.show', [$chapitre, $sousChapitre]) }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection