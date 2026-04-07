@extends('layouts.app')
@section('content')
    <h2>Générer du contenu avec l'IA ✨</h2>
    <form method="POST" action="{{ route('admin.ollama.generate') }}">
        @csrf
        <div class="mb-3">
            <label>Type de génération</label>
            <select name="type" class="form-control" required>
                <option value="contenu">Contenu pédagogique</option>
                <option value="quiz">Quiz (questions/réponses)</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Sujet</label>
            <input type="text" name="sujet" class="form-control" placeholder="ex: Les verbes irréguliers en anglais" required>
        </div>
        <div class="mb-3">
            <label>Sous-chapitre associé (optionnel pour quiz)</label>
            <select name="sous_chapitre_id" class="form-control">
                <option value="">-- Aucun --</option>
                @foreach($sousChapitres as $sc)
                    <option value="{{ $sc->id }}">{{ $sc->chapitre->formation->nom }} → {{ $sc->chapitre->titre }} → {{ $sc->titre }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success">Générer ✨</button>
    </form>
@endsection