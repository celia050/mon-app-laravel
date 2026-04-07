@extends('layouts.app')
@section('content')
    <h2>Ajouter une question au quiz : {{ $quiz->titre }}</h2>
    <form method="POST" action="{{ route('admin.questions.store') }}">
        @csrf
        <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
        <div class="mb-3">
            <label>Question</label>
            <input type="text" name="question" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Réponses (coche la bonne)</label>
            @for($i = 0; $i < 4; $i++)
                <div class="input-group mb-2">
                    <div class="input-group-text">
                        <input type="radio" name="bonne_reponse" value="{{ $i }}" {{ $i == 0 ? 'checked' : '' }}>
                    </div>
                    <input type="text" name="reponses[]" class="form-control" placeholder="Réponse {{ $i + 1 }}" required>
                </div>
            @endfor
        </div>
        <button class="btn btn-success">Ajouter la question</button>
        <a href="{{ route('admin.quiz.show', $quiz) }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection