<x-app-layout>
    <div class="py-12 px-6 lg:px-0 md:px-8">

        <div class="max-w-7xl mx-auto lg:px-8 lg:w-full gap-4 grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1">
            @foreach ($locationsResource as $location)
                <x-cards :location="$location" :company="$location['company']" :sector="$location['sector']" :user="$location['nickname']" />
            @endforeach
        </div>

        <div class="py-5 max-w-7xl mx-auto lg:px-8 flex justify-center">
            {{-- <x-pagination :paginator="$locations" :appends="$filters" /> --}}
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @if (!Auth::hasLocations())
        <script>
            var intervalo = 60000;

            // Função para recarregar a página
            function reloadPage() {
                location.reload();
            }

            // Define o intervalo de recarga
            setInterval(reloadPage, intervalo);
        </script>
    @endif
</x-app-layout>
