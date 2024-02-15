<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">


                    {{-- <x-alert /> --}}

                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Informações do Perfil') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __("Atualize as informações do perfil da sua conta e o endereço de e-mail.ddress. ") }}
                            </p>
                        </header>

                        <form method="post" action="{{ route('companies.store') }}" class="mt-6 space-y-6">
                            @csrf()

                            @include('companies.partials.form', ['companie' => null])
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
