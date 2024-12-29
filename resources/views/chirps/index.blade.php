<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('chirpss') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('chirps.store') }}">
                        @csrf
                        <textarea name="message"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="{{ __('What\'s on your mind?') }}">{{ old('message') }}</textarea>
                        <x-input-error :messages="$errors->get('message')" class="mt-1" />

                        <x-primary-button class="mt-3">Chirp</x-primary-button>
                    </form>
                </div>
            </div>


            <div class="mt-5 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg divide-y dark:divide-gray-900">
                @foreach ($chirps as $chirp)
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="p-6">
                            @php
                                $fecha = $chirp->updated_at->diffForHumans();
                                $fecha2 = $chirp->created_at->format('d/m/Y H:i');
                            @endphp

                            <div class="flex space-x-4 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user">
                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <div class="flex flex-row space-x-4 w-full">
                                    <div class="flex flex-col">
                                        <p class="font-semibold">{{ $chirp->user->name }}</p>
                                    </div>
                                    <div class="flex flex-col mt-1 text-xs text-gray-500 dark:text-gray-400">
                                        <p>{{ $fecha }}</p>
                                    </div>
                                    <div class="flex flex-col mt-1 text-xs text-gray-500 dark:text-gray-400">
                                        @if ($chirp->created_at != $chirp->updated_at)
                                            <p>{{ __('Edited') }}</p>
                                        @endif
                                        {{-- @unless ($chirp->created_at->eq($chirp->updated_at))
                                            <p>{{ __('Edited') }}</p>
                                        @endunless --}}
                                    </div>

                                </div>
                                @can('update', $chirp)
                                    <x-dropdown>
                                        <x-slot name="trigger">
                                            <button>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-more-horizontal">
                                                    <circle cx="12" cy="12" r="1"></circle>
                                                    <circle cx="19" cy="12" r="1"></circle>
                                                    <circle cx="5" cy="12" r="1"></circle>
                                                </svg>
                                            </button>
                                        </x-slot>
                                        <x-slot name="content">
                                            <x-dropdown-link :href="route('chirps.edit', $chirp)">
                                                {{ __('Edit') }}
                                            </x-dropdown-link>
                                            <form method="POST" action="{{route('chirps.destroy',$chirp)}}">
                                                @csrf @method('DELETE')
                                                <x-dropdown-link :href="route('chirps.destroy', $chirp)" onclick="event.preventDefault(); this.closest('form').submit();">
                                                    {{ __('Delete') }}
                                                </x-dropdown-link>



                                            </form>
                                            
                                            
                                        </x-slot>

                                    </x-dropdown>
                                @endcan



                            </div>


                            <div class="flex space-x-4 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-square">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                </svg>
                                <div class="flex flex-col ">
                                    <p>{{ $chirp->message }}</p>
                                </div>



                            </div>

                        </div>

                    </div>
                @endforeach


            </div>



</x-app-layout>
