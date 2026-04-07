@extends('layouts.app')
@section('content')
    <h2>Résultats des quiz</h2>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Apprenant</th>
                <th>Quiz</th>
                <th>Score</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse($resultats as $resultat)
                <tr>
                    <td>{{ $resultat->user->name }}</td>
                    <td>{{ $resultat->quiz->titre }}</td>
                    <td>
                        <span class="badge" style="background: {{ $resultat->score >= $resultat->total/2 ? '#10b981' : '#ef4444' }}; color:white; padding: 6px 12px; border-radius: 8px;">
                            {{ $resultat->score }} / {{ $resultat->total }}
                        </span>
                    </td>
                    <td>{{ $resultat->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center">Aucun résultat</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection