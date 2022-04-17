<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administration') }}
      </h2>
   </x-slot>
   @if (isset($question))  
      <form action="{{url('admin/question/'.$question->id)}}" method="POST">
      @csrf
      @method('PUT')
      <input name="texte" type="text" placeholder="intitulé de la question" value="{{$question->texte}}">
      <input name="image" type="file"  value="{{$question->image}}">
   @else
      <form action="{{url('admin/question')}}" method="POST">
      @csrf
      <input name="texte" type="text" placeholder="intitulé de la question">
      <input name="image" type="file">
   @endif

   @if (isset($question))
         @foreach ($question->propositions as $proposition)
            <input name="reponse_1" type="text" value="{{ $proposition != NULL ? $proposition:''}}">
         @endforeach
   @else
      <input name="reponse_1" type="text">
      <input name="reponse_2" type="text">
      <input name="reponse_3" type="text">
      <input name="reponse_4" type="text">
   @endif
   @if (isset($question))
      <input type="submit" value="Editer">
   @else
      <input type="submit" class="submit" value="Ajouter">
   @endif
   </form>
</x-app-layout>