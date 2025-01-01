<x-app-layout>
    <!-- Contenedor para el canvas -->
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">
        <div id="threejs-container" class="bg-black w-full h-96">
            <!-- El canvas se añadirá aquí por JavaScript -->
        </div>

    </div>
  

     
    @vite('resources/js/main.js')  <!-- Esto incluirá tu archivo main.js -->
</x-app-layout>
