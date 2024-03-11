<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Adicionando nome do setor ') }}
                            </h2>
                        </header>

                        <form method="POST" action="{{ route('sectors.store', ['company_id' => $company_id]) }}" class="mt-6 space-y-6">
                            @csrf
                            <input type="hidden" name="company_id" value="{{ $company_id }}">
                            <div>
                                <div>
                                    <x-input-label for="name" :value="__('Nome do setor')" />
                                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                        value="{{ old('name') }}" required autofocus autocomplete="name" />
                                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                </div>
                                <br>

                                <x-primary-button>{{ __('Salvar') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
