   <x-app-layout>
      <x-slot name="header">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               {{ __('Administration') }}
         </h2>
      </x-slot>
      <form action="{{url('admin/question/'.$question->id)}}" method="POST">
         @csrf
         @method('PUT')
         <input name="name" type="text" value="{{ $question->texte }}" placeholder="intituler de la question">
         <input name="image" type="file" value="{{ $question->image != '' ? $question->image:'' }}">
         {{var_dump($question->propositions)}}
         @foreach ($question->propositions as $proposition)
         <input name="reponse_1" type="text" value="{{ $proposition != '' ? $proposition:''}}">
         @endforeach
         <input type="submit" value="Editer">
      </form>
   </x-app-layout>
