<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Task Manager') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans antialiased">

<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg hidden md:block">
        <div class="p-6 text-xl font-bold text-blue-600">
            TaskApp 
        </div>

        <nav class="mt-6">
            <a href="{{ route('tasks.index') }}"
               class="block px-6 py-3 text-gray-700 hover:bg-blue-100 transition">
                📋 Mes tâches
            </a>

            <a href="{{ route('tasks.create') }}"
               class="block px-6 py-3 text-gray-700 hover:bg-blue-100 transition">
                ➕ Ajouter tâche
            </a>
        </nav>
    </aside>

    <!-- Main content -->
    <div class="flex-1 flex flex-col">

        <!-- Navbar -->
        <header class="bg-white shadow flex justify-between items-center px-6 py-4">
            <h1 class="text-lg font-semibold text-gray-700">
                @yield('header', 'Dashboard')
            </h1>

            <div class="flex items-center gap-4">
                <span class="text-gray-600 text-sm">
                    {{ auth()->user()->name ?? 'User' }}
                </span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-red-500 hover:underline text-sm">
                        Logout
                    </button>
                </form>
            </div>
        </header>

        <main class="p-6">
            @yield('content')
        </main>

    </div>

</div>

</body>
</html>
