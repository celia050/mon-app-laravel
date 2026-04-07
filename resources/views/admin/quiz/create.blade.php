@extends('layouts.app')
@section('content')
    <h2>Nouveau quiz</h2>
    <form method="POST" action="{{ route('admin.quiz.store') }}">
        @csrf
        <input type="hidden" name="sous_chapitre_id" value="{{ request('sous_chapitre_id') }}">
        <div class="mb-3">
            <label>Titre du quiz</label>
            <input type="text" name="titre" class="form-control" required>
        </div>
        <button class="btn btn-success">Créer</button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection