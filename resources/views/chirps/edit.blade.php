<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Chrip') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{route('chirps.update',$chirp)}}">
                        @csrf @method('PUT')
                        <textarea name="message"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="{{ __('What\'s on your mind?') }}">{{ old('message',$chirp-> message) }}</textarea>
                        <x-input-error :messages="$errors->get('message')" class="mt-1" />

                        <x-primary-button class="mt-3">Chirp</x-primary-button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>