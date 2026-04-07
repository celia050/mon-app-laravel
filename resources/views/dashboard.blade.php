@extends('layouts.app')

@section('content')
    <h2>Bienvenue, {{ auth()->user()->name }} 👋</h2>

    @if(auth()->user()->isAdmin())
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card text-center p-3">
                    <h5>Formations</h5>
                    <a href="{{ route('admin.formations.index') }}" class="btn btn-primary mt-2">Gérer</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center p-3">
                    <h5>Notes</h5>
                    <a href="{{ route('admin.notes.index') }}" class="btn btn-primary mt-2">Gérer</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center p-3">
                    <h5>Générer avec IA ✨</h5>
                    <a href="{{ route('admin.ollama.form') }}" class="btn btn-success mt-2">Lancer</a>
                </div>
            </div>
        </div>
    @else
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card text-center p-3">
                    <h5>Mes formations</h5>
                    <a href="{{ route('apprenant.formations') }}" class="btn btn-primary mt-2">Voir</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-center p-3">
                    <h5>Mes notes</h5>
                    <a href="{{ route('apprenant.notes') }}" class="btn btn-primary mt-2">Voir</a>
                </div>
            </div>
        </div>
    @endif
@endsection