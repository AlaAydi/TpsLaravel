@extends('layouts.app')

@section('title','Mes Tâches')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3>
            Mes Tâches
            <span class="badge bg-primary">
                {{ $tasks->count() }}
            </span>
        </h3>
        <div>
            <span class="badge bg-primary">{{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-danger">Deconnexion</button>
            </form>
        </div>
    </div>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary btn-modern">Nouvelle tâche</a>
</div>

@forelse($tasks as $task)

<div class="card mb-3 shadow-sm">

<div class="card-body d-flex justify-content-between">

<div>

<h5 class="{{ $task->completed ? 'text-decoration-line-through text-success' : '' }}">
{{ $task->title }}
</h5>

<p class="text-muted">
{{ $task->description }}
</p>

</div>

<div>

@can('update', $task)
<a href="{{ route('tasks.edit',$task) }}" class="btn btn-warning btn-sm">
Modifier
</a>
@endcan

@can('delete', $task)
<form action="{{ route('tasks.destroy',$task) }}" method="POST" class="d-inline">
@csrf
@method('DELETE')
<button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ?')">
Supprimer
</button>
</form>
@endcan>

</div>

</div>

</div>

@empty

<div class="text-center p-4">

<h5>Aucune tâche</h5>

<a href="{{ route('tasks.create') }}" class="btn btn-success">

Créer votre première tâche

</a>

</div>

@endforelse

@endsection
