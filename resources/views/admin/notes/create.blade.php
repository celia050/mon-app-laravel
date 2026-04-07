@extends('layouts.app')
@section('content')
    <h2>Ajouter une note</h2>
    <form method="POST" action="{{ route('admin.notes.store') }}">
        @csrf
        <div class="mb-3">
            <label>Apprenant</label>
            <select name="user_id" class="form-control" required>
                @foreach($apprenants as $apprenant)
                    <option value="{{ $apprenant->id }}">{{ $apprenant->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Formation</label>
            <select name="formation_id" class="form-control" required>
                @foreach($formations as $formation)
                    <option value="{{ $formation->id }}">{{ $formation->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Matière</label>
            <input type="text" name="matiere" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Note /20</label>
            <input type="number" name="note" class="form-control" min="0" max="20" step="0.5" required>
        </div>
        <button class="btn btn-success">Enregistrer</button>
        <a href="{{ route('admin.notes.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection