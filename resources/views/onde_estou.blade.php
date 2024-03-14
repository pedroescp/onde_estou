<x-app-layout>

    {{-- Home base --}}

    <div class="py-12 px-6 lg:px-0 md:px-0">

        <div class="w-full items-center flex justify-center pb-4">
            <button type="button"
            data-modal-target="popup-modal" data-modal-toggle="popup-modal" 
                class="w-full justify-center inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Onde estou?
            </button>
        </div>

        <div
            class="
            max-w-7xl
            mx-auto lg:px-8 gap-4
            grid lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1
        ">
            <x-cards />
            <x-cards />
            <x-cards />
            <x-cards />
            <x-cards />
        </div>
    </div>


    


</x-app-layout>
