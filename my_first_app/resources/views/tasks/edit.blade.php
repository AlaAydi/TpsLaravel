@extends('layouts.app')

@section('title','Modifier tâche')

@section('content')

<h3 class="mb-4">
Modifier la tâche
</h3>

<form action="{{ route('tasks.update',$task) }}" method="POST">

@csrf
@method('PUT')

<div class="mb-3">

<label class="form-label">
Titre
</label>

<input
type="text"
name="title"
class="form-control"
value="{{ old('title',$task->title) }}">

</div>

<div class="mb-3">

<label class="form-label">
Description
</label>

<textarea
name="description"
class="form-control"
rows="4">

{{ old('description',$task->description) }}

</textarea>

</div>

<div class="form-check mb-3">

<input
type="checkbox"
name="completed"
class="form-check-input"
{{ $task->completed ? 'checked' : '' }}>

<label class="form-check-label">

Marquer comme terminée

</label>

</div>

<button class="btn btn-primary">

Mettre à jour

</button>

<a href="{{ route('tasks.index') }}" class="btn btn-secondary">

Annuler

</a>

</form>

@endsection
