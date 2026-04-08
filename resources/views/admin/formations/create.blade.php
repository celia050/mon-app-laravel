@extends('layouts.app')
@section('content')
<h2>Nouvelle formation</h2>
<form method="POST" action="{{ route('admin.formations.store') }}">
    @csrf
    <div class="mb-3">
        <label>Nom</label>
        <input type="text" id="titre" name="nom" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea id="description" name="description" class="form-control" rows="5"></textarea>
    </div>
    <div class="mb-3">
        <label>Niveau</label>
        <select name="niveau" class="form-control">
            <option>Débutant</option>
            <option>Intermédiaire</option>
            <option>Avancé</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Durée (heures)</label>
        <input type="number" name="duree" class="form-control">
    </div>
    <button type="button" class="btn btn-info mb-3" onclick="generateIA()">
        Générer avec IA
    </button>
    <br>
    <button class="btn btn-success">Créer</button>
    <a href="{{ route('admin.formations.index') }}" class="btn btn-secondary">Annuler</a>
</form>
<script>
function generateIA() {
    const prompt = document.getElementById("titre").value;
    fetch("{{ route('admin.generate-ia') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({ prompt: prompt })
    })
    .then(res => res.json())
    .then(data => {
        document.getElementById("description").value = data.description;
    })
    .catch(error => console.error(error));
}
</script>
@endsection
