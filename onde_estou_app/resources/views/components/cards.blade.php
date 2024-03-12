@props(['location', 'company', 'sector', 'user'])

<a href="#"
class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 sm:w-full">
  
    {{-- <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
        src="/docs/images/blog/image-4.jpg" alt=""> --}}
    <div class="flex flex-col justify-between p-4 leading-normal w-full">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $user }}</h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Localizacao: <b>{{ $sector->name }}</b> na empresa <b>{{ $company->name }}</b></p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-xs">{{ $location['updated_ago'] }}</p>
    </div>
</a>
