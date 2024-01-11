<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">

                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Profile Information') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __("Update your account's profile information and email address.") }}
                            </p>
                        </header>

                        <form method="post" action="{{ route('companies.store') }}" class="mt-6 space-y-6">
                            @csrf()

                            <div>
                                <x-input-label for="name" :value="__('Nome da empresa')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                    :value="old('name')" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>
                            <div>

                                <x-input-label for="parent_id" :value="__('Nome da empresa')" />
                                <x-text-input id="parent_id" name="parent_id" type="text" class="mt-1 block w-full"
                                    :value="old('parent_id')" autofocus autocomplete="parent_id" />
                                <x-input-error class="mt-2" :messages="$errors->get('parent_id')" />
                            </div>
                            <x-primary-button>{{ __('Save') }}</x-primary-button>


                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
