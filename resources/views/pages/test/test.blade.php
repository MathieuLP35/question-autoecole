<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Teste') }}
        </h2>
    </x-slot>

    @foreach($questions as $question)
    <form action="{{url('results/'.$question->id)}}" method="POST">
        @csrf	
        <div class="border p-6 m-2">
            <p>{{ $question->texte }}</p>
            @foreach ($question->propositions as $proposition)
                <label for="proposition_{{$proposition['rep_id']}}">{{ $proposition['name'] }}</label>
                <input type="checkbox" id="proposition_{{$proposition['rep_id']}}" name="proposition_{{$proposition['rep_id']}}">
            @endforeach
            <input type="submit" class="btn-green m-2" value="Envoyer mes réponses">
        </div>
    </form>
    @endforeach

</x-app-layout>
