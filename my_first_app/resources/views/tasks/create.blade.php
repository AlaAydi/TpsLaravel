@extends('layouts.app')

@section('header', 'Nouvelle tâche')

@section('content')

<div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow">

    <h2 class="text-xl font-semibold mb-6 text-gray-800">
        Créer une tâche
    </h2>

    @if ($errors->any())
        <div class="mb-4 bg-red-100 text-red-600 p-3 rounded-lg">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <!-- Title -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Titre
            </label>

            <input
                type="text"
                name="title"
                value="{{ old('title') }}"
                placeholder="Ex: Apprendre Laravel"
                class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('title') border-red-500 @enderror">

            @error('title')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Description
            </label>

            <textarea
                name="description"
                rows="4"
                placeholder="Détails de la tâche..."
                class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('description') }}</textarea>
        </div>

        <div class="flex justify-between items-center">

            <button
                class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition shadow">
                Enregistrer
            </button>

            <a href="{{ route('tasks.index') }}"
               class="text-gray-500 hover:underline">
                Annuler
            </a>

        </div>

    </form>

</div>

@endsection
