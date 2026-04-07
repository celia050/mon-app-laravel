@extends('layouts.app')
@section('content')
    <h2>{{ $chapitre->titre }}</h2>
    <p>{{ $chapitre->description }}</p>

    <hr>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Sous-chapitres</h4>
        <a href="{{ route('admin.chapitres.sous-chapitres.create', $chapitre) }}" class="btn btn-success btn-sm">+ Sous-chapitre</a>
    </div>

    @forelse($chapitre->sousChapitres as $sc)
        <div class="card mb-2">
            <div class="card-body d-flex justify-content-between">
                <span>{{ $sc->titre }}</span>
                <div>
                    <a href="{{ route('admin.chapitres.sous-chapitres.show', [$chapitre, $sc]) }}" class="btn btn-sm btn-info">Voir</a>
                    <a href="{{ route('admin.chapitres.sous-chapitres.edit', [$chapitre, $sc]) }}" class="btn btn-sm btn-warning">Modifier</a>
                    <form method="POST" action="{{ route('admin.chapitres.sous-chapitres.destroy', [$chapitre, $sc]) }}" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Supprimer ?')">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <p>Aucun sous-chapitre</p>
    @endforelse

    <a href="{{ route('admin.formations.show', $chapitre->formation) }}" class="btn btn-secondary mt-3">Retour</a>
@endsection