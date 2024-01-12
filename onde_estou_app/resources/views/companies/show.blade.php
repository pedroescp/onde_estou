<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">

                    <section>
                        <header>
                            Nome da empresa: {{ $companie->name }}
                            Id {{ $companie->id }}

                            <x-primary-button>
                                <a href="{{ route('companies.edit', $companie->id) }}">Editar</a>
                            </x-primary-button>

                            <form action="{{ route('companies.delete', $companie->id) }}" method="post">
                                @csrf()
                                @method('DELETE')
                                <button type="submit">
                                    Deletar
                                </button>
                            </form>
                        </header>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
