<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10 ">
            <div class="block items-center justify-center bg-white overflow-hidden  sm:rounded-lg space-y-10">
                <h1 class="text-7xl font-bold text-center">Innovación en cada capa de impresión</h1>
                <h2 class="text-2xl text-center text-gray-500">En Morfeo3D, ofrecemos soluciones de impresión 3D de alta
                    calidad, desde prototipos funcionales hasta
                    piezas personalizadas. Da vida a tus proyectos con precisión, rapidez y materiales innovadores.</h2>
            </div>

            <div class="block items-center justify-center bg-white overflow-hidden  sm:rounded-lg space-y-10">
                <h1 class="text-4xl font-bold text-center">Nuestros servicios</h1>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <h2 class="text-2xl font-bold text-center">Impresión 3D</h2>
                            <p class="text-center">Impresión de prototipos, piezas personalizadas y producción en serie.</p>
                        </div>
                    </div>
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <h2 class="text-2xl font-bold text-center">Diseño 3D</h2>
                            <p class="text-center">Diseño de piezas y prototipos para impresión 3D.</p>
                        </div>
                    </div>
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <h2 class="text-2xl font-bold text-center">Escaneo 3D</h2>
                            <p class="text-center">Escaneo de piezas y objetos para impresión 3D.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div>
               <h3>Sube tu archivo</h3>

                <form method="POST" action="{{ route('profile.edit') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" id="file" class="block p-2.5 w-auto text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <x-input-error :messages="$errors->get('file')" class="mt-1" />
                    <x-primary-button class="mt-3">Subir</x-primary-button>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
