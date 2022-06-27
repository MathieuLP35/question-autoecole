<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
			<a title="Acceuil backend"class="backend hover:underline"href="{{ route('admin') }}" :active="request()->routeIs('admin')">{{ __('Administration') }}</a>&nbsp;/&nbsp;Utilisateur&nbsp;❓
        </h2>
    </x-slot>
	@if (isset($user))
	
	<div class="flex justify-center flex-wrap bg-black p-8 gap-y-8">
		<div class="block text-center w-full mx-1.5 text-stone-50 p-4 bg-gray-700 rounded-lg">{{$user->name}}</div>
		<div class="block text-center w-full mx-1.5 text-stone-50 p-4 bg-gray-700 rounded-lg">{{$moyenne}} % de reussite</div>
		<div class="block text-center w-full mx-1.5 text-stone-50 p-4 bg-gray-600 rounded-lg">Historique des Résultats</div>
			<ul class="flex justify-center flex-wrap gap-y-2">
				@foreach ($scores as $score)
				<li class="block text-center w-full mx-1.5 text-stone-50 p-4 bg-gray-500 rounded-lg">
					{{$score->moy}} % le {{date('d/m/Y', strtotime($score->created_at))}}
				</li>
				@endforeach
			</ul>
		</div>
	@endif
</x-app-layout>
