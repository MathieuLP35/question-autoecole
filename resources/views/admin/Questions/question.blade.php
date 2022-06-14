<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
			<a title="Acceuil backend"class="backend hover:underline"href="{{ route('admin') }}" :active="request()->routeIs('admin')">{{ __('Administration') }}</a>&nbsp;/&nbsp;Questions&nbsp;❓
        </h2>
    </x-slot>
	@if (isset($question))
	
	<div class="flex justify-around flex-wrap bg-black p-8 gap-y-8">
		<div class="question_illustration">
			<img src="/storage/{{$question->image}}" alt="">
		</div>
		<div class="block w-full text-stone-50 p-4 bg-gray-700 rounded-lg">{{$question->texte}}</div>
			@foreach ($question->propositions as $proposition)
				<label class="block w-5/12 cursor-pointer p-4 text-center rounded-lg text-stone-50 bg-gray-700 hover:bg-blue-700" for="reponse_{{$proposition['rep_id']}}" value={{ $proposition['name'] != NULL ? $proposition['name']:''}}>{{$proposition['name']}}</label>
				<input id="reponse_{{$proposition['rep_id']}}" name="reponse_{{$proposition['rep_id']}}" type="hidden" value={{ $proposition['name'] != NULL ? $proposition['name']:''}}>
			@endforeach
	</div>
 	<a href="{{url('admin/question')}}"><div class="icone-admin-2"></div></a>
	@else
		<h3>🚙&nbsp;Aucune Question&nbsp;🚙</h3>
		<a href="{{url('admin/question')}}">Retour a la liste des questions</a>
	@endif
</x-app-layout>
