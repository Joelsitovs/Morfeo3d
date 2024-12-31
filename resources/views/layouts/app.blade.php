<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Morfeo3D') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-white white">
            <div class="mt-10 bg-white mb-10" id="responsiveDiv">
            @include('layouts.navigation')
        </div>
        
        <script>
            function handleResize() {
                const responsiveDiv = document.getElementById('responsiveDiv');
                if (window.innerWidth < 640) {
                  
                    responsiveDiv.classList.remove('mb-10');
                    responsiveDiv.classList.remove('mt-10');


                } else {
                    responsiveDiv.classList.add('mb-10');
                    responsiveDiv.classList.add('mt-10');
                }
            }
        
            // Ejecutar al cargar y cuando se redimensiona la ventana
            window.addEventListener('resize', handleResize);
            handleResize();
        </script>

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
