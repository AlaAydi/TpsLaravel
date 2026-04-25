@extends('layouts.app')

@section('header', 'Mes Tâches')

@section('content')

<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-2xl font-bold text-gray-800">
            Mes Tâches
            <span class="bg-blue-500 text-white text-sm px-2 py-1 rounded">
                {{ $tasks->count() }}
            </span>
        </h2>

        <p class="text-sm text-gray-500 mt-1">
            Connecté : {{ auth()->user()->name }}
        </p>
    </div>

    <a href="{{ route('tasks.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">
        + Nouvelle tâche
    </a>
</div>

<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

@forelse($tasks as $task)

<div class="bg-white p-5 rounded-xl shadow hover:shadow-lg transition">

    <h3 class="text-lg font-semibold
        {{ $task->completed ? 'line-through text-green-500' : 'text-gray-800' }}">
        {{ $task->title }}
    </h3>

    <p class="text-gray-500 text-sm mt-2">
        {{ $task->description }}
    </p>

    <div class="flex justify-between items-center mt-4">

        <span class="text-xs text-gray-400">
            {{ $task->created_at->diffForHumans() }}
        </span>

        <div class="flex gap-2">

            @can('update', $task)
            <a href="{{ route('tasks.edit',$task) }}"
               class="text-blue-500 hover:underline text-sm">
                Modifier
            </a>
            @endcan

            @can('delete', $task)
            <form action="{{ route('tasks.destroy',$task) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="text-red-500 hover:underline text-sm"
                        onclick="return confirm('Supprimer ?')">
                    Supprimer
                </button>
            </form>
            @endcan

        </div>

    </div>

</div>

@empty

<div class="col-span-3 text-center py-10">
    <h3 class="text-gray-500 mb-4">Aucune tâche</h3>

    <a href="{{ route('tasks.create') }}"
       class="bg-green-500 text-white px-4 py-2 rounded-lg">
        Créer votre première tâche
    </a>
</div>

@endforelse

</div>

@endsection
