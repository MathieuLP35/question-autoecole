<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a title="Acceuil backend"class="backend hover:underline"href="{{ route('admin') }}" :active="request()->routeIs('admin')">{{ __('Administration') }}</a>&nbsp;/&nbsp;Utilisateur&nbsp;❓
        </h2>
    </x-slot>

	<x-jet-validation-errors class="mb-4" />
    
	{{-- Type de Formulaire --}}

	<form action="{{isset($user) ? url('admin/utilisateur/'.$user->id) :url('admin/utilisateur/') }}" method="POST">
	@csrf	
    @if (isset($user))
		@method('PUT')
    @endif

	{{-- Propositions de réponse --}}
    <input type="text" name="name" id="name" value="{{isset($user) ? $user->name : NULL }}" placeholder="nom du candidat" required autofocus/>
    <input type="email" name="email" id="email"  value="{{isset($user) ? $user->email : NULL }}" placeholder="Email du candidat" required/>
	@if (isset($user))
        <select name="role" id="role" required> 
        @switch($user->role)
            @case(1)
                <option value="1" selected>Utilisateur</option>
                <option value="3">Administrateur</option>
                @break
            @case(3)
                <option value="1">Utilisateur</option>
                <option value="3" selected>Administrateur</option>
                @break
            @default
                <option value="1">Utilisateur</option>
                <option value="3">Administrateur</option>
        @endswitch
        </select>
        <select name="groupe_id" id="groupe_id" required> 
            <option value="{{ $user->groupe_id }}" selected>{{ $user->groupe->groupname }}</option>
            @foreach($groupes as $groupe)
                @if ($groupe->id != $user->groupe_id)
                    <option value="{{ $groupe->id }}">{{ $groupe->groupname }}</option>
                @endif
            @endforeach
        </select>
    @else
    <input type="password" name="password" id="password" placeholder="Mot de passe du candidat" required/>
    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirmation du mot de passe" required/>
    <select name="role" id="role" required> 
        <option value="1">Utilisateur</option>
        <option value="3">Administrateur</option>
    </select>
    <select name="groupe_id" id="groupe_id" required> 
        @foreach($groupes as $groupe)
            <option value="{{ $groupe->id }}">{{ $groupe->groupname }}</option>
        @endforeach
    </select>
	@endif

	{{-- Bouton envoi formulaire --}}

    <input type="submit" value={{isset($user) ? "Editer" : "Ajouter" }}>

    </form>
</x-app-layout>
