@extends('layouts.app')
@section('content')
    <h2>Contenu généré ✨</h2>
    <div class="card p-4 mb-4">
        {!! $contenu !!}
    </div>
    <a href="{{ route('admin.ollama.form') }}" class="btn btn-secondary">Générer autre chose</a>
@endsection