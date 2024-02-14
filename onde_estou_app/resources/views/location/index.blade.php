<x-app-layout>
    <div class="py-12 px-6 lg:px-0 md:px-8">
        <div class="py-5 max-w-7xl mx-auto lg:px-8 flex flex-col sm:flex-row justify-between items-center">

            <!-- Barra de pesquisa -->
            <input type="text" id="table-search"
                class="block p-2 text-sm text-gray-900 border border-gray-300 rounded-lg mb-3 sm:mb-0 w-full sm:w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Search for items">

            <!-- Botão "Adicionar onde estou" -->
            @if (Auth::hasLocations())
                <x-primary-button-tag-a href="{{ route('locations.create') }}" class="w-full sm:w-auto">
                    Atualizar onde estou
                </x-primary-button-tag-a>
            @else
                <x-primary-button-tag-a href="{{ route('locations.create') }}" class="w-full sm:w-auto">
                    Adicionar onde estou
                </x-primary-button-tag-a>
            @endif
        </div>

        <div class="max-w-7xl mx-auto lg:px-8 lg:w-full gap-4 grid lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1">
            @foreach ($locationsResource as $location)
                <x-cards :location="$location" :company="$location->company" :sector="$location->sector" :user="$location->user" />
            @endforeach
        </div>

        <div class="py-5 max-w-7xl mx-auto lg:px-8 flex justify-center">
            {{-- <x-pagination :paginator="$locations" :appends="$filters" /> --}}
        </div>
    </div>
</x-app-layout>
