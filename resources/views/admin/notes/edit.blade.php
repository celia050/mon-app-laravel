@extends('layouts.app')
@section('content')
    <h2>Modifier la note</h2>
    <form method="POST" action="{{ route('admin.notes.update', $note) }}">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Matière</label>
            <input type="text" name="matiere" class="form-control" value="{{ $note->matiere }}" required>
        </div>
        <div class="mb-3">
            <label>Note /20</label>
            <input type="number" name="note" class="form-control" value="{{ $note->note }}" min="0" max="20" step="0.5" required>
        </div>
        <button class="btn btn-warning">Modifier</button>
        <a href="{{ route('admin.notes.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection