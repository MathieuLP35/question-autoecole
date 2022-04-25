<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administration') }}
        </h2>
    </x-slot>
	
	{{-- Type de Formulaire --}}

	<form action={{isset($user) ? url('admin/utilisateur/'.$user->id) :url('admin/utilisateur/') }} method="POST">
	@csrf	
    @if (isset($user))
		@method('PUT')
    @endif

	{{-- Propositions de réponse --}}

	@if (isset($user))
        <input type="text" name="name" id="name" value="{{ $user->name }}" />
        <input type="text" name="email" id="email" value="{{ $user->email }}" />
        <select name="role" id="role"> 
            @if($user->role == 1)
            <option value="1" selected>Utilisateur</option>
            <option value="3">Administrateur</option>
            @elseif($user->role == 3)
            <option value="1">Utilisateur</option>
            <option value="3" selected>Administrateur</option>
            @endif
        </select>
        @else
        <input type="text" name="name" id="name" placeholder="Nom du candidat" />
        <input type="text" name="password" id="password" placeholder="Mot de passe du candidat" />
        <input type="text" name="password_confirmation" id="password_confirmation" placeholder="Confirmation du mot de passe" />
        <input type="text" name="email" id="email" placeholder="Email du candidat" />
        <select name="role" id="role"> 
            <option value="1">Utilisateur</option>
            <option value="3">Administrateur</option>
        </select>
	@endif

	{{-- Bouton envoi formulaire --}}

    <input type="submit" value={{isset($user) ? "Editer" : "Ajouter" }}>

    </form>
</x-app-layout>
