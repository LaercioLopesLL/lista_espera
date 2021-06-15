<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body>
    <header class="bg-gray-800">
        <div class="flex justify-between items-center h-16 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('home') }}">
                <h1 class="text-xl text-gray-200">Lista de Espera</h1>
            </a>
            <nav class="flex space-x-4">
                <a class="text-gray-200" href="{{ route('alunos') }}">Alunos</a>
                <a class="text-gray-200" href="{{ route('cursos') }}">Cursos</a>
            </nav>
        </div>
    </header>

    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>
    @livewireScripts
</body>

</html>