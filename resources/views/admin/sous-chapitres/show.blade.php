@extends('layouts.app')
@section('content')
    <h2>{{ $sousChapitre->titre }}</h2>
    <div class="card p-3 mb-4">{!! $sousChapitre->contenu !!}</div>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Quiz</h4>
        @if(!$sousChapitre->quiz)
            <a href="{{ route('admin.quiz.create', ['sous_chapitre_id' => $sousChapitre->id]) }}" class="btn btn-success btn-sm">+ Créer un quiz</a>
        @endif
    </div>

    @if($sousChapitre->quiz)
        <div class="card p-3">
            <h5>{{ $sousChapitre->quiz->titre }}</h5>
            <a href="{{ route('admin.quiz.show', $sousChapitre->quiz) }}" class="btn btn-info btn-sm">Gérer le quiz</a>
        </div>
    @else
        <p>Aucun quiz pour ce sous-chapitre</p>
    @endif

    <a href="{{ route('admin.formations.chapitres.show', [$chapitre->formation, $chapitre]) }}" class="btn btn-secondary mt-3">Retour</a>
@endsection