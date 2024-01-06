<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">

                    <section>
                        <header>
                            <form method="post" action="{{ route('companies.update', $companie->id) }}"
                                class="mt-6 space-y-6">
                                @csrf()
                                
                                <div>
                                    <input type="text" value="PUT" name="_method" hidden>
                                    <x-input-label for="name" :value="__('Nome da empresa')" />
                                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                        :value="old('name', $companie->name)" required autofocus autocomplete="name" />
                                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                </div>
                                <x-primary-button>{{ __('Save') }}</x-primary-button>


                            </form>
                        </header>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
