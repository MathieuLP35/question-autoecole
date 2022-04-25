<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administration') }}
        </h2>
    </x-slot>

	<x-jet-validation-errors class="mb-4" />
    
	{{-- Type de Formulaire --}}

	<form action={{isset($user) ? url('admin/utilisateur/'.$user->id) :url('admin/utilisateur/') }} method="POST">
	@csrf	
    @if (isset($user))
		@method('PUT')
    @endif

	{{-- Propositions de réponse --}}

	@if (isset($user))
        <input type="text" name="name" id="name" value="{{ $user->name }}" required autofocus/>
        <input type="text" name="email" id="email" value="{{ $user->email }}" required/>
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
        <input type="text" name="name" id="name" placeholder="Nom du candidat" required autofocus/>
        <input type="password" name="password" id="password" placeholder="Mot de passe du candidat" required/>
        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirmation du mot de passe" required/>
        <input type="email" name="email" id="email" placeholder="Email du candidat" required/>
        <select name="role" id="role" required> 
            <option value="1">Utilisateur</option>
            <option value="3">Administrateur</option>
        </select>
	@endif

	{{-- Bouton envoi formulaire --}}

    <input type="submit" value={{isset($user) ? "Editer" : "Ajouter" }}>

    </form>
</x-app-layout>
