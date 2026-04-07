@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Formations</h2>
        <a href="{{ route('admin.formations.create') }}" class="btn btn-success">+ Nouvelle formation</a>
    </div>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Nom</th>
                <th>Niveau</th>
                <th>Durée</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($formations as $formation)
                <tr>
                    <td>{{ $formation->nom }}</td>
                    <td>{{ $formation->niveau }}</td>
                    <td>{{ $formation->duree }}h</td>
                    <td>
                        <a href="{{ route('admin.formations.show', $formation) }}" class="btn btn-sm btn-info">Voir</a>
                        <a href="{{ route('admin.formations.edit', $formation) }}" class="btn btn-sm btn-warning">Modifier</a>
                        <form method="POST" action="{{ route('admin.formations.destroy', $formation) }}" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Supprimer ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center">Aucune formation</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection