<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="w-full flex items-center justify-between flex-col sm:flex-row">
                    <h1 class="text-gray-50 text-3xl"><b>{{ $companie->name }}</b></h1>
                    <div class="flex flex-col sm:flex-row gap-6 mt-4 sm:mt-0">
                        <a href="{{ route('companies.edit', $companie->id) }}"
                            class="font-medium text-green-600 dark:text-green-500 hover:underline">
                            Editar
                        </a>
                        <form action="{{ route('companies.delete', $companie->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <a href="">
                                <button type="submit"
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                    Deletar empresa
                                </button>
                            </a>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="py-2">
                    <div class="flex flex-col sm:flex-row flex-wrap sm:space-x-4 items-center justify-between pb-4">
                        <!-- Barra de pesquisa -->
                        <div class="w-full mb-4 sm:mb-0 sm:w-auto"> <!-- Alterado para sm:w-auto -->
                            <label for="table-search" class="sr-only">Search</label>
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-seidden="true"
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

                        <div class="w-full sm:w-auto">
                            <a href="{{ route('sectors.create', $companie->id) }}"
                                class="justify-center relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 w-full sm:w-auto">
                                Adicionar novo setor {{$companie->id}}
                            </a>
                        </div>
                    </div>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-4">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nome do Setor   
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Data
                            </th>
                        </thead>
                        <tbody>
                            @foreach ($companie->sectors as $sector)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4">{{ $sector['id'] }}</td>
                                    <td class="px-6 py-4">{{ $sector['name'] }}</td>
                                    <td class="px-6 py-4">
                                        {{ strftime('%d/%m/%Y %H:%M:%S', strtotime($sector['created_at'])) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <x-pagination :paginator="$companie" :appends="$filters" /> --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
