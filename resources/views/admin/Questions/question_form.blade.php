<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administration') }}
        </h2>
    </x-slot>
	
	{{-- Type de Formulaire --}}

	<form action={{isset($question) ? url('admin/question/'.$question->id) :url('admin/question/') }} method="POST" class="paragraph--admin-question">
		@csrf	
		<h1>Configuration de question</h1>
    @if (isset($question))
		@method('PUT')
    @endif

	{{-- Intituler de la question --}}

	<input class="admin-question full-width" name="texte" type="text" placeholder="intitulé de la question" value={{isset($question) ? $question->texte : NULL }} >

	{{-- Image de la question --}}

	<input id="image" name="image" type="file" value={{isset($question) ? $question->image : NULL }}>

	{{-- Propositions de réponse --}}

	@if (isset($question))
	
		@foreach ($question->propositions as $proposition)
			<input name="reponse_{{$proposition['rep_id']}}" type="text" value={{ $proposition['name'] != NULL ? $proposition['name']:''}}>
			<input type="checkbox" name="reponse_{{$proposition['rep_id']}}_valid" {{ $proposition['valid'] != null ? "checked":''}}>
		@endforeach
	
	@else

	<label for="reponse_1">Réponse 1</label>
	<div class="question-item">
		<input name="reponse_1" type="text" class="admin-question"><input type="checkbox" name="reponse_1_valid" class="valider">
	</div>

	<label for="reponse_1">Réponse 2</label>
	<div class="question-item">
		<input name="reponse_2" type="text" class="admin-question"><input type="checkbox" name="reponse_2_valid" class="valider">
	</div>

	<label for="reponse_1">Réponse 3</label>
	<div class="question-item">
		<input name="reponse_3" type="text" class="admin-question"><input type="checkbox" name="reponse_3_valid" class="valider">
	</div>

	<label for="reponse_1">Réponse 4</label>
	<div class="question-item">
		<input name="reponse_4" type="text" class="admin-question"><input type="checkbox" name="reponse_4_valid" class="valider">
	</div>
	@endif
	<label for="id_groupe">Groupe Associées</label>
		<select name="id_groupe" id="id_groupe" class="select-list">
			<option selected value="0">Choisissez un Groupe</option>
			@foreach($groupes as $groupe)
				<option value="{{$groupe->id}}">{{$groupe->groupname}}</option>
			@endforeach
		</select>
	{{-- Bouton envoi formulaire --}}
	
    <input  class="btn-green btn-question-admin" type="submit" value={{isset($question) ? "Editer" : "Ajouter" }}>
    </form>
</x-app-layout>
