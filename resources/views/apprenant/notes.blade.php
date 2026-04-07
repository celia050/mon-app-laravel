@extends('layouts.app')
@section('content')
    <h2>Mes notes</h2>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr><th>Formation</th><th>Matière</th><th>Note</th></tr>
        </thead>
        <tbody>
            @forelse($notes as $note)
                <tr>
                    <td>{{ $note->formation->nom }}</td>
                    <td>{{ $note->matiere }}</td>
                    <td>{{ $note->note }}/20</td>
                </tr>
            @empty
                <tr><td colspan="3" class="text-center">Aucune note</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection