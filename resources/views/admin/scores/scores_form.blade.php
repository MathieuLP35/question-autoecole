<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a title="Acceuil backend"class="backend hover:underline"href="{{ route('admin') }}" :active="request()->routeIs('admin')">{{ __('Administration') }}</a>&nbsp;/&nbsp;Score&nbsp;❓
        </h2>
    </x-slot>

	<x-jet-validation-errors class="mb-4" />
	{{-- Type de Formulaire --}}

	<form class="paragraph--admin-form" action="{{isset($score) ? url('admin/score/'.$score->id) :url('admin/score/') }}" method="POST">
	@csrf
	<h1>Configuration de score</h1>
    @if (isset($score))
		@method('PUT')
    @endif

	{{-- Résultats --}}
	<label for="moy">Résultat</label>
    <input type="number" name="moy" id="moy" placeholder="Resultat" step="0.01" value="{{isset($score) ? $score->moy : NULL }}" required autofocus/>
	<label for="user_id">Utilisateur</label>
	@if (isset($score))
        <select name="user_id" id="user_id" required> 
            <option value="{{ $score->user_id }}" selected>{{ $score->user->name }}</option>
            @foreach($users as $user)
                @if ($score->user_id != $user->id)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endif
            @endforeach
        </select>
    @else
    <select name="user_id" id="user_id" required> 
        @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>
	@endif

	{{-- Bouton envoi formulaire --}}

    <input class="btn-green btn-form-admin" type="submit" value={{isset($score) ? "Editer" : "Ajouter" }}>

    </form>
</x-app-layout>
