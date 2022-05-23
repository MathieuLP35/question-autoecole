<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administration') }}
        </h2>
    </x-slot>
	
    <form action="{{isset($groupe) ? url('admin/groupe/'.$groupe->id) :url('admin/groupe/') }}" method="POST" class="paragraph--admin-form">
        <h1>Configuration des groupe</h1>
    @csrf
    @if (isset($groupe))
		@method('PUT')
    @endif

	{{-- Intituler du groupe --}}
    <label for="groupname">Nom du groupe</label>
	<input name="groupname" type="text" placeholder="intitulé du groupe" value="{{isset($question) ? $groupe->groupname : NULL }}">
    
	{{-- Moyenne de la question --}}
    
    <label for="moy">Moyenne</label>
	<input name="moy" type="number" value="{{isset($groupe) ? $groupe->moy : NULL }}">

	{{-- Bouton envoi formulaire --}}

    <input class="btn-green btn-form-admin" type="submit" value="{{isset($groupe) ? "Editer" : "Ajouter" }}">

    </form>

    </x-app-layout>