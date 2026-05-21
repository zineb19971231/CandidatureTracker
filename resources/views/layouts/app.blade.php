<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-gray-900 bg-gray-100">
        
        <!-- 1. Conteneur global en Flexbox -->
        <div class="flex min-h-screen">
            
            <!-- 2. On inclut ton fichier de Sidebar à gauche -->
            @include('layouts.sidebar') <!-- Ajuste le chemin si ton fichier est ailleurs -->

            <!-- 3. Zone de droite : Contenu principal -->
            <div class="flex-grow flex flex-col min-w-0">
                
                <!-- La barre de navigation du haut (si présente) -->
                @include('layouts.navigation')

                <!-- Le Slot pour le Header de tes pages -->
                @if (isset($header))
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                <!-- Le Slot principal où s'injecte le Dashboard -->
                <main class="flex-grow">
                    {{ $slot }}
                </main>
                
            </div>
        </div>
    </body>
</html>