<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administration') }}
        </h2>
    </x-slot>
    <main>
        <h1 class="text-center mt-20 py-12">Panneau de contrôle</h1>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg text-center p-6">
                    <a href="{{url('admin/utilisateur')}}">Compte Utilisateur</a>
                </div>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg text-center p-6 mt-4">
                    <a href="{{url('admin/question')}}">Question</a>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>