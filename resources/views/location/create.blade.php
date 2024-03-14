<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    {{-- <x-alert /> --}}
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Onde você está?') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Selecione e salve sua localização atual para aprimorar a comunicação dentro do seu setor.') }}
                            </p>
                        </header>
                        <form method="post" action="{{ route('locations.store') }}" class="mt-6 space-y-6">
                            @csrf
                            <div>
                                <div>
                                    <x-input-label for="location" :value="__('Setor')" />
                                    <select id="location" name="sector_id"
                                        onchange="updateSelectedSectorId(this.value)"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected disabled>{{ __('Selecione um setor') }}</option>
                                        {{-- @foreach ($sectors as $sector)
                                            <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                                        @endforeach --}}
                                    </select>
                                    <x-input-error class="mt-2" :messages="$errors->get('sector_id')" />
                                </div>
                                <x-primary-button class="mt-5">{{ __('Estou aqui!') }}</x-primary-button>
                            </div>
                        </form>

                    </section>
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
                        option.val(sector.id);
                        option.text(sector.name + ' - ' + sector.company.name);

                        $('#location').append(option);
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    </script>
</x-app-layout>
