<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="w-full flex items-center justify-between flex-col sm:flex-row">
                    <h1 class="text-gray-50 text-3xl dark:text-white text-neutral-950"><b>{{ $user->name }}</b></h1>
                    <div class="flex flex-col sm:flex-row gap-6 mt-4 sm:mt-0">
                        <a href="{{ route('users.edit', $user->id) }}"
                            class="font-medium text-green-600 dark:text-green-500 hover:underline">
                            Editar
                        </a>
                        <form action="{{ route('users.delete', $user->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <a href="">
                                <button type="submit"
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                    Deletar usuário
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

                        <form method="post" action="{{ route('locations.store') }}" class="mt-6 space-y-6">
                            @csrf
                            <div>
                                <div>
                                    <x-input-label id="location_id" :value="__('Setor')" />
                                    <select id="location" name="sector_id"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected disabled>{{ __('Selecione um setor') }}</option>
                                        {{-- @foreach ($sectors as $sector)
                                            <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                                        @endforeach --}}
                                    </select>
                                    <x-input-error class="mt-2" :messages="$errors->get('sector_id')" />
                                </div>
                                <x-primary-button class="mt-5">{{ __('Atualizar setor de origem') }}</x-primary-button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $.ajax({
                    url: '/api/sectors',
                    method: 'GET',
                    success: function(response) {
                        $('#location').empty().append(
                            '<option selected disabled>{{ __('Selecione um setor') }}</option>');

                        response.data.forEach(function(sector) {
                            var option = $('<option>');
                            option.val(sector.sector_id);
                            option.text(sector.name + ' - ' + sector.company.name);

                            $('#location').append(option);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });


                $('#location').change(function() {
                    $('#location_id').val($(this).val())
                });
            });
        </script>
</x-app-layout>
