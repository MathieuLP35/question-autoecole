<x-app-layout>
    <x-slot name="header">
        <h2 class="breadcrump">
			<a title="Acceuil" class="hover:underline" href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">{{ __('Accueil') }}</a>&nbsp;/&nbsp;Questions&nbsp;❓
        </h2>
    </x-slot>
    {{-- On vérifie que $question est null --}}
    @if($question == "[]")
        <div class="block w-full text-center p-4 text-xl">
            Aucune question n'a été trouvée.
        </div>
    @else
        <!-- <div class="flex justify-around flex-wrap p-8 gap-y-8"> -->
            <div class="question">
                <div class="question-illustration">
                    <img src="{{$question->image}}" alt="">
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
                    <div class="question-submit">
                        <input type="submit" class="btn-green m-2" value="Envoyer mes réponses">
                    </div>
                </form>
            </div>
    @endif

</x-app-layout>