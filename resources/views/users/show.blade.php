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
                    <div class="justify-between">
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Atualizar setor de origem') }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("Atualize o setor de origem do funcionário") }}
                        </p>
                    </div>
                    <div>
                        <form id="updateSectorForm" method="post" action="{{ route('users.sector', ['id' => $user->id]) }}">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <div>
                                <x-input-label id="user_id" :value="__('Setor')" style="display: none" />
                                <select id="user" name="sector_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="0" selected>{{ __('Selecione o setor de origem do usuário') }}</option>
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('sector_id')" />
                            </div>
                            <x-primary-button id="updateSectorButton" type="submit" class="mt-6" disabled>{{ __('Atualizar setor de origem') }}</x-primary-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function () {
                $.ajax({
                    url: '/api/sectors',
                    method: 'GET',
                    success: function (response) {
                        $('#user').empty().append(
                            '<option selected disabled>{{ __('Selecione o setor de origem do usuario') }}</option>');

                        // Se houver setores retornados na resposta, use o primeiro ID encontrado
                        if (response.data.length > 0) {
                            response.data.forEach(function (sector) {
                                var option = $('<option>');
                                option.val(sector.sector_id);
                                option.text(sector.name + ' - ' + sector.company.name);
                                $('#user').append(option);
                            });
                        }

                        // Se o ID do setor não foi definido ou for igual a 0, defina como 1
                        var currentSectorId = {{$sectors->id ?? 1}};
                        if (!currentSectorId || currentSectorId == 0) {
                            currentSectorId = 1;
                        }
                        $("#user").val(currentSectorId);

                        // Desabilite o botão de atualização do setor
                        $('#updateSectorButton').prop('disabled', true);
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                    }
                });

                // Ative o botão de atualização quando o usuário alterar o select
                $('#user').change(function () {
                    $('#user_id').val($(this).val());

                    // Atualize a ação do formulário com o novo ID do setor
                    var newAction = $("#updateSectorForm").attr("action").split('/');
                    newAction.pop(); // Remove o último segmento (ID antigo)
                    newAction.push($(this).val()); // Adiciona o novo ID do setor
                    newAction = newAction.join('/'); // Reune os segmentos novamente
                    $("#updateSectorForm").attr("action", newAction);

                    // Crie um objeto com os dados do formulário
                    var formData = {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        sector_id: $(this).val()
                    };

                    // Envie a requisição POST
                    $.ajax({
                        url: '/users/sector/{{$user->id}}',
                        method: 'POST',
                        data: formData,
                        success: function (response) {
                            // Redirecione para a página de usuários após a atualização
                            window.location.href = '/users';
                        },
                        error: function (xhr, status, error) {
                            console.error(error);
                        }
                    });

                    // Ative o botão de atualização do setor
                    $('#updateSectorButton').prop('disabled', false);
                });
            });
        </script>
</x-app-layout>
