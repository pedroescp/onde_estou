<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    {{-- <x-alert /> --}}
                    <section>
                        <header>
                            <form method="post" action="{{ route('companies.update', $companie->id) }}"
                                class="mt-6 space-y-6">
                                @csrf()

                                @include('companies.partials.form', ['companies' => $companie->name])

                            </form>
                        </header>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
