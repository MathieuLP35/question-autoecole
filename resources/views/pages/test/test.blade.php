<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
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
                <div class="question_illustration">
                    <img src="/storage/{{$question->image}}" alt="">
                </div>
                <form action="{{url('results/'.$question->id)}}" method="POST" class="w-full flex justify-around flex-wrap p-8 gap-y-8">
                    @csrf	
                    <div class="block w-full text-stone-50 p-4 bg-gray-700 rounded-lg">
                        {{$question->texte}}
                    </div>
                    @foreach ($question->propositions as $proposition)
                        <label for="proposition_{{$proposition['rep_id']}}">{{ $proposition['name'] }}</label>
                        <input type="checkbox" id="proposition_{{$proposition['rep_id']}}" name="proposition_{{$proposition['rep_id']}}">
                    @endforeach
                    <div class="w-full flex justify-center">
                        <input type="submit" class="btn-green m-2" value="Envoyer mes réponses">
                    </div>
                </form>
            </div>
    @endif

</x-app-layout>