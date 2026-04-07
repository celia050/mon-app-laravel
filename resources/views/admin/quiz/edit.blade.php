@extends('layouts.app')
@section('content')
    <h2>Modifier le quiz</h2>
    <form method="POST" action="{{ route('admin.quiz.update', $quiz) }}">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Titre</label>
            <input type="text" name="titre" class="form-control" value="{{ $quiz->titre }}" required>
        </div>
        <button class="btn btn-warning">Modifier</button>
        <a href="{{ route('admin.quiz.show', $quiz) }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection