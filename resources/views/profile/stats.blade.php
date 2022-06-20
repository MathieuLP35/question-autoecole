<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Statistiques') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-4">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="px-4 py-5 sm:p-0">
                    <div class="flex items-center justify-center">
                        <span class="flex items-center justify-center h-12 w-12 rounded-full bg-indigo-500 text-white">
                            <i class="fas fa-2x fa-user-circle"></i>
                        </span>
                        <p class="px-4 py-5">Votre taux de réussite: {{ $score->moy }}%</p> 
                    </div>
                </div>
            </div>
        </div>               
    </div>

</x-app-layout>
