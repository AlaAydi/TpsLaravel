@extends('layouts.app')

@section('header', 'Modifier tâche')

@section('content')

<div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow">

<form action="{{ route('tasks.update',$task) }}" method="POST">
@csrf
@method('PUT')

<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700 mb-1">
        Titre
    </label>

    <input type="text"
           name="title"
           value="{{ old('title',$task->title) }}"
           class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-200">
</div>

<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700 mb-1">
        Description
    </label>

    <textarea name="description"
              class="w-full border rounded-lg px-3 py-2"
              rows="4">{{ old('description',$task->description) }}</textarea>
</div>

<div class="flex items-center gap-2 mb-4">
    <input type="checkbox"
           name="completed"
           {{ $task->completed ? 'checked' : '' }}>

    <span class="text-sm text-gray-600">
        Terminée
    </span>
</div>

<div class="flex justify-between">
    <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
        Mettre à jour
    </button>

    <a href="{{ route('tasks.index') }}"
       class="text-gray-500 hover:underline">
        Annuler
    </a>
</div>

</form>

</div>

@endsection
