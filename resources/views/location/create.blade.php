<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Onde você está?') }}
                            </h2>
                        </header>

                        <!-- Select para Empresas -->
                        <div class="mt-4">
                            <x-input-label :value="__('Empresa')" />
                            <select id="companySelect"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 disabled:opacity-50 disabled:cursor-not-allowed">
                                <option selected disabled>{{ __('Selecione uma empresa') }}</option>
                                {{-- @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach --}}
                            </select>
                        </div>

                        <!-- Select para Setores -->
                        <div class="mt-4">
                            <x-input-label :value="__('Setor')" />
                            <select id="sectorSelect" disabled
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 disabled:opacity-50 disabled:cursor-not-allowed">
                                <option selected disabled>{{ __('Selecione um setor') }}</option>
                            </select>
                        </div>

                        <div class="mt-6 flex space-x-4">
                            <!-- Formulário para atualizar o setor de origem -->
                            <form method="post" action="{{ route('locations.updateOrigin', Auth::id()) }}">
                                @csrf
                                <x-primary-button type="submit" id="backToOriginBtn">
                                    {{ __('Voltar ao setor de origem') }}
                                </x-primary-button>
                            </form>

                            <!-- Formulário para guardar a localização atual -->
                            <form method="post" action="{{ route('locations.store') }}">
                                @csrf
                                <!-- Input oculto para armazenar o ID do setor -->
                                <input type="hidden" id="location_id" name="sector_id" />

                                <x-primary-button type="submit" id="currentLocationBtn" disabled>
                                    {{ __('Estou aqui!') }}
                                </x-primary-button>
                            </form>
                        </div>
                    </section>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Carregar empresas
            $.ajax({
                url: '/api/companies',
                method: 'GET',
                success: function(response) {
                    response.data.forEach(function(company) {
                        $('#companySelect').append($('<option>').val(company.id).text(company
                            .name));
                    });
                }
            });

            // Evento de mudança para carregar setores
            $('#companySelect').change(function() {
                var companyId = $(this).val();

                $.ajax({
                    url: '/api/sectors/company/' + companyId,
                    method: 'GET',
                    success: function(response) {
                        $('#sectorSelect').empty().append($('<option>').val('').text(
                            'Selecione um setor')).prop('disabled', false);
                        response.data.forEach(function(sector) {
                            $('#sectorSelect').append($('<option>').val(sector
                                .sector_id).text(sector.name));
                        });
                    }
                });
            });

            // Habilitar botão "Estou aqui" quando um setor for selecionado
            $('#sectorSelect').change(function() {
                if ($(this).val() !== '') {
                    $('#currentLocationBtn').prop('disabled', false);
                } else {
                    $('#currentLocationBtn').prop('disabled', true);
                }
            });

            // Evento de clique para 'Estou aqui!'
            $('#currentLocationBtn').click(function() {
                // Implementar lógica para abrir modal e depois a ação AJAX
            });

            $('#sectorSelect').change(function() {
                var selectedSectorId = $(this).val();
                $('#location_id').val(selectedSectorId);

                if (selectedSectorId !== '') {
                    $('#currentLocationBtn').prop('disabled', false);
                } else {
                    $('#currentLocationBtn').prop('disabled', true);
                }
            });


            // Evento de clique para 'Voltar ao setor de origem'
            $('#backToOriginBtn').click(function() {
                var userId = $(this).data('user-id');
                // Implementar lógica para abrir modal e depois a ação AJAX
            });
        });
    </script>
</x-app-layout>
