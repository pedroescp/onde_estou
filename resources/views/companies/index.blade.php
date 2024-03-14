<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex flex-col sm:flex-row flex-wrap sm:space-x-4 items-center justify-between pb-4">
                        <!-- Barra de pesquisa -->
                        <div class="w-full mb-4 sm:mb-0 sm:w-auto"> <!-- Alterado para sm:w-auto -->
                            <label for="table-search" class="sr-only">Search</label>
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input type="text" id="table-search"
                                    class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-full bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Search for items">
                            </div>
                        </div>

                        <!-- Botão "Adicionar nova empresa" -->
                        <div class="w-full sm:w-auto"> <!-- Alterado para w-full em dispositivos pequenos -->
                            <a href="{{ route('companies.create') }}"
                                class="justify-center relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 w-full sm:w-auto">
                                Adicionar nova empresa
                            </a>
                        </div>
                    </div>

                    <div class="table-wrapper overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">ID</th>
                                    <th scope="col" class="px-6 py-3">Nome</th>
                                    <th scope="col" class="px-6 py-3">Status</th>
                                    <th scope="col" class="px-6 py-3">Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($companies->items() as $companie)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 clickable-row text-sm">
                                        <td class="px-6 py-4">
                                            {{ $companie->id }}
                                        </td>
                                        <td class="px-6 py-4 clickable-element">
                                            <a href="{{ route('companies.show', $companie->id) }}"
                                                class="font-bold dark:text-white text-neutral-950">
                                                {{ $companie->name }}
                                            </a>
                                        </td>
                                        <td class="px-6 py-4 flex items-center">
                                            <div
                                                class="w-2 h-2 mr-2 rounded-full {{ getStatusCompanie($companie->status) == 'Active' ? 'bg-green-500' : 'bg-red-500' }}">
                                            </div>
                                            <span>{{ getStatusCompanie($companie->status) == 'Active' ? 'Ativo' : 'Inativo' }}</span>
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ \Carbon\Carbon::parse($companie->created_at)->format('d/m/Y H:i:s') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <x-pagination :paginator="$companies" :appends="$filters" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        // Add a click event listener to rows with the "clickable-row" class
        $('.clickable-row').click(function() {
            // Get the URL from the "Detalhar" link in the row
            var url = $(this).find('a').attr('href');

            // Redirect the user to the specified URL
            window.location.href = url;
        });
    });
</script>
