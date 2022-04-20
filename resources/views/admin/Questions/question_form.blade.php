<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administration') }}
        </h2>
    </x-slot>
	
	{{-- Type de Formulaire --}}

	<form action={{isset($question) ? url('admin/question/'.$question->id) :url('admin/question/') }} method="POST">
	@csrf	
    @if (isset($question))
		@method('PUT')
    @endif

	{{-- Intituler de la question --}}

	<input name="texte" type="text" placeholder="intitulé de la question" value={{isset($question) ? $question->texte : NULL }}>

	{{-- Image de la question --}}

	<input name="image" type="file" value={{isset($question) ? $question->image : NULL }}>

	{{-- Propositions de réponse --}}

	@if (isset($question))
		@foreach ($question->propositions as $proposition)
			<input name="reponse_{{$proposition['rep_id']}}" type="text" value={{ $proposition['name'] != NULL ? $proposition['name']:''}}>
		@endforeach
	@else
		<input name="reponse_1" type="text">
		<input name="reponse_2" type="text">
		<input name="reponse_3" type="text">
		<input name="reponse_4" type="text">
	@endif

	{{-- Bouton envoi formulaire --}}

    <input type="submit" value={{isset($question) ? "Editer" : "Ajouter" }}>

    </form>
</x-app-layout>
