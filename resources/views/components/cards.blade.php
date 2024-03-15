@props(['location', 'company', 'sector', 'user'])

@auth
    @if (!Auth::user()->sector_origin || Auth::user()->sector_origin != $sector->id)
        <a href="#"
            class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 sm:w-full">

            <div class="flex flex-col justify-between p-4 leading-normal w-full">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $user }}</h5>
                <p class="mb-1 text-xl font-normal text-gray-700 dark:text-gray-400">Setor: <b>{{ $sector->name }}</b></p>
                <p class="mb-1 text-xl font-normal text-gray-700 dark:text-gray-400">Dentro da empresa:
                    <b>{{ $company->name }}</b>
                </p>
                <p class="mb-1 font-normal text-gray-700 dark:text-gray-400 text-xs">{{ $location['updated_ago'] }}</p>
            </div>
        </a>
    @endif
@endauth

@guest
    <a href="#"
        class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 sm:w-full">

        <div class="flex flex-col justify-between p-4 leading-normal w-full">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $user }}</h5>
            <p class="mb-1 text-xl font-normal text-gray-700 dark:text-gray-400">Setor: <b>{{ $sector->name }}</b></p>
            <p class="mb-1 text-xl font-normal text-gray-700 dark:text-gray-400">Dentro da empresa:
                <b>{{ $company->name }}</b>
            </p>
            <p class="mb-1 font-normal text-gray-700 dark:text-gray-400 text-xs">{{ $location['updated_ago'] }}</p>
        </div>
    </a>
@endguest
