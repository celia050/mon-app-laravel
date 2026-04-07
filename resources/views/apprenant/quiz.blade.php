@extends('layouts.app')
@section('content')
    <h2>{{ $quiz->titre }}</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('quiz.soumettre', $quiz) }}">
        @csrf
        @foreach($quiz->questions as $question)
            <div class="card mb-3">
                <div class="card-body">
                    <h6>{{ $question->question }}</h6>
                    @foreach($question->reponses as $reponse)
                        <div class="form-check">
                            <input class="form-check-input" type="radio"
                                name="reponses[{{ $question->id }}]"
                                value="{{ $reponse->id }}" required>
                            <label class="form-check-label">{{ $reponse->texte }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
        <button class="btn btn-success">Soumettre mes réponses</button>
    </form>
@endsection