@extends('layouts.app')
@section('content')
    <h2>Nouveau chapitre</h2>
    <form method="POST" action="{{ route('admin.formations.chapitres.store', $formation) }}">
        @csrf
        <div class="mb-3">
            <label>Titre</label>
            <input type="text" name="titre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>
        <button class="btn btn-success">Créer</button>
        <a href="{{ route('admin.formations.show', $formation) }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection