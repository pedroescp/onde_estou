<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="table-wrapper overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">ID</th>
                                    <th scope="col" class="px-6 py-3">Nome</th>
                                    <th scope="col" class="px-6 py-3">Email</th>
                                    <th scope="col" class="px-6 py-3">Data</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users->items() as $user)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 clickable-row text-sm">
                                        <td class="px-6 py-4">
                                            {{ $user->id }}
                                        </td>
                                        <td class="px-6 py-4 clickable-element">
                                            <a href="{{ route('users.show', $user->id) }}"
                                                class="font-bold dark:text-white text-neutral-950">
                                                {{ $user->name }}
                                            </a>
                                        </td>
                                        <td class="px-6 py-4 flex items-center">
                                            {{$user->email}}
                                        </td>
                                        

                                        <td class="px-6 py-4">
                                            {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i:s') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <x-pagination :paginator="$users" :appends="$filters" />
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
