<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table>
                        <thead>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Data</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach ($companies as $companie)
                                <tr>
                                    <td>{{ $companie->id }}</td>
                                    <td>{{ $companie->name }}</td>
                                    <td>{{ $companie->created_at }}</td>
                                    <td> <a href="{{ route('companies.show', $companie->id) }}">Consultar</a> </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('companies.create') }}">
                            <x-application-logo
                                class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>