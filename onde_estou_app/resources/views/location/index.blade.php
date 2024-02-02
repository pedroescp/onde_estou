<x-app-layout>
    <div class="py-12 px-6 lg:px-0 md:px-0">
        <div class="py-5 max-w-7xl mx-auto lg:px-8 flex justify-between">

            <input type="text" id="table-search"
                class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Search for items">

            <x-primary-button-tag-a href="{{ route('companies.create') }}">
                Adicionar nova empresa
            </x-primary-button-tag-a>
        </div>

        <div class="max-w-7xl mx-auto lg:px-8 gap-4 grid lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1">
            @foreach ($locations->items() as $location)
                <x-cards />
            @endforeach

        </div>
        <div class="py-5 max-w-7xl mx-auto lg:px-8 flex justify-center">
            <x-pagination :paginator="$locations" :appends="$filters" />
        </div>
    </div>
</x-app-layout>
