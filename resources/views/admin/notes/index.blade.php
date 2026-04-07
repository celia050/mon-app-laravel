@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Notes</h2>
        <a href="{{ route('admin.notes.create') }}" class="btn btn-success">+ Ajouter une note</a>
    </div>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr><th>Apprenant</th><th>Formation</th><th>Matière</th><th>Note</th><th>Actions</th></tr>
        </thead>
        <tbody>
            @forelse($notes as $note)
                <tr>
                    <td>{{ $note->user->name }}</td>
                    <td>{{ $note->formation->nom }}</td>
                    <td>{{ $note->matiere }}</td>
                    <td>{{ $note->note }}/20</td>
                    <td>
                        <a href="{{ route('admin.notes.edit', $note) }}" class="btn btn-sm btn-warning">Modifier</a>
                        <form method="POST" action="{{ route('admin.notes.destroy', $note) }}" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Supprimer ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center">Aucune note</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection