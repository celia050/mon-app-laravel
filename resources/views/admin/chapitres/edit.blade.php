@extends('layouts.app')
@section('content')
    <h2>Modifier le chapitre</h2>
    <form method="POST" action="{{ route('admin.formations.chapitres.update', [$formation, $chapitre]) }}">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Titre</label>
            <input type="text" name="titre" class="form-control" value="{{ $chapitre->titre }}" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="3">{{ $chapitre->description }}</textarea>
        </div>
        <button class="btn btn-warning">Modifier</button>
        <a href="{{ route('admin.formations.show', $formation) }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection