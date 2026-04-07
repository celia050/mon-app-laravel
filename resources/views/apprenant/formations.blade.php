@extends('layouts.app')
@section('content')
    <h2>Mes formations</h2>
    @forelse($formations as $formation)
        <div class="card mb-3">
            <div class="card-body">
                <h5>{{ $formation->nom }}</h5>
                <p>{{ $formation->description }}</p>
                <span class="badge bg-primary">{{ $formation->niveau }}</span>
                @foreach($formation->chapitres as $chapitre)
                    <div class="mt-2">
                        <strong>{{ $chapitre->titre }}</strong>
                        <ul>
                            @foreach($chapitre->sousChapitres as $sc)
                                <li>
                                    {{ $sc->titre }}
                                    @if($sc->quiz)
                                        <a href="{{ route('quiz.show', $sc->quiz) }}" class="btn btn-sm btn-outline-success ms-2">Faire le quiz</a>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    @empty
        <p>Vous n'êtes inscrit à aucune formation.</p>
    @endforelse
@endsection