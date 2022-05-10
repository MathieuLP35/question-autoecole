<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Teste') }}
        </h2>
    </x-slot>

    @foreach($questions as $question)
        <h3>{{ $question->texte }}</h3>
		@foreach ($question->propositions as $proposition)
            <p>{{ $proposition['name'] }}</p>
		@endforeach
    @endforeach

</x-app-layout>
