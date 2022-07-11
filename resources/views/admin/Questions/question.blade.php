<x-app-layout>
    <x-slot name="header">
        <h2 class="breadcrump">
			<a title="Acceuil backend"class="backend hover:underline"href="{{ route('admin') }}" :active="request()->routeIs('admin')">{{ __('Administration') }}</a>&nbsp;/&nbsp;Questions&nbsp;❓
        </h2>
    </x-slot>
	@if (isset($question))
	
	<div class="question">
		<div class="question-illustration">
			<img src="/storage/{{$question->image}}" alt="">
		</div>
		<form action="{{url('results/'.$question->id)}}" method="POST" class="question-form">
			@csrf	
			<div class="question-intitule">
				{{$question->texte}}
			</div>
			@foreach ($question->propositions as $proposition)
			<div class="question-reponse">
				<label for="proposition_{{$proposition['rep_id']}}">{{ $proposition['name'] }}</label>
				<input type="checkbox" id="proposition_{{$proposition['rep_id']}}" name="proposition_{{$proposition['rep_id']}}">
			</div>
			@endforeach
		</form>
	</div>
 	<a href="{{url('admin/question')}}"><div class="icone-admin-2"></div></a>
	@else
		<h3>🚙&nbsp;Aucune Question&nbsp;🚙</h3>
		<a href="{{url('admin/question')}}">Retour a la liste des questions</a>
	@endif
</x-app-layout>
