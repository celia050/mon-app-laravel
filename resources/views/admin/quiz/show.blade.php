@extends('layouts.app')
@section('content')
    <h2>{{ $quiz->titre }}</h2>
    <a href="{{ route('admin.questions.create', ['quiz_id' => $quiz->id]) }}" class="btn btn-success mb-3">+ Ajouter une question</a>

    @forelse($quiz->questions as $question)
        <div class="card mb-3">
            <div class="card-body">
                <h6>{{ $question->question }}</h6>
                <ul>
                    @foreach($question->reponses as $reponse)
                        <li class="{{ $reponse->est_correcte ? 'text-success fw-bold' : '' }}">
                            {{ $reponse->texte }} {{ $reponse->est_correcte ? '✅' : '' }}
                        </li>
                    @endforeach
                </ul>
                <form method="POST" action="{{ route('admin.questions.destroy', $question) }}" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    @empty
        <p>Aucune question</p>
    @endforelse

    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Retour</a>
@endsection