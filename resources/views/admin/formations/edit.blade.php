@extends('layouts.app')

@section('content')
    <h2>Modifier la formation</h2>
    <form method="POST" action="{{ route('admin.formations.update', $formation) }}">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control" value="{{ $formation->nom }}" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="3">{{ $formation->description }}</textarea>
        </div>
        <div class="mb-3">
            <label>Niveau</label>
            <select name="niveau" class="form-control">
                <option {{ $formation->niveau == 'Débutant' ? 'selected' : '' }}>Débutant</option>
                <option {{ $formation->niveau == 'Intermédiaire' ? 'selected' : '' }}>Intermédiaire</option>
                <option {{ $formation->niveau == 'Avancé' ? 'selected' : '' }}>Avancé</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Durée (heures)</label>
            <input type="number" name="duree" class="form-control" value="{{ $formation->duree }}">
        </div>
        <button class="btn btn-warning">Modifier</button>
        <a href="{{ route('admin.formations.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection