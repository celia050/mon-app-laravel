@extends('layouts.app')
@section('content')
    <h2>{{ $formation->nom }}</h2>
    <p>{{ $formation->description }}</p>
    <p><strong>Niveau :</strong> {{ $formation->niveau }} | <strong>Durée :</strong> {{ $formation->duree }}h</p>

    <hr>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Chapitres</h4>
        <a href="{{ route('admin.formations.chapitres.create', $formation) }}" class="btn btn-success btn-sm">+ Chapitre</a>
    </div>

    @forelse($formation->chapitres as $chapitre)
        <div class="card mb-2">
            <div class="card-body d-flex justify-content-between">
                <span>{{ $chapitre->titre }}</span>
                <div>
                    <a href="{{ route('admin.formations.chapitres.show', [$formation, $chapitre]) }}" class="btn btn-sm btn-info">Voir</a>
                    <a href="{{ route('admin.formations.chapitres.edit', [$formation, $chapitre]) }}" class="btn btn-sm btn-warning">Modifier</a>
                    <form method="POST" action="{{ route('admin.formations.chapitres.destroy', [$formation, $chapitre]) }}" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Supprimer ?')">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <p>Aucun chapitre</p>
    @endforelse

    <hr>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Apprenants inscrits</h4>
    </div>

    @forelse($formation->apprenants as $apprenant)
        <div class="card mb-2">
            <div class="card-body d-flex justify-content-between align-items-center">
                <span>{{ $apprenant->name }} — {{ $apprenant->email }}</span>
                <form method="POST" action="{{ route('admin.formations.retirer', [$formation, $apprenant]) }}" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Retirer ?')">Retirer</button>
                </form>
            </div>
        </div>
    @empty
        <p>Aucun apprenant inscrit</p>
    @endforelse

    <form method="POST" action="{{ route('admin.formations.ajouter', $formation) }}" class="mt-3 d-flex gap-2">
        @csrf
        <select name="user_id" class="form-control">
            @foreach($apprenants as $apprenant)
                <option value="{{ $apprenant->id }}">{{ $apprenant->name }} — {{ $apprenant->email }}</option>
            @endforeach
        </select>
        <button class="btn btn-success">+ Ajouter</button>
    </form>

    <a href="{{ route('admin.formations.index') }}" class="btn btn-secondary mt-3">Retour</a>
@endsection