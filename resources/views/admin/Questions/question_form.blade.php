@foreach ($questions as $question)
   <form action="#" method="POST">
      @csrf
      @method('PUT')
      <input name="name" type="text" placeholder="intituler de la question" value="{{$question->texte != '' ? $question->texte:''}}">
      <input name="illustration" type="file" value="{{$question->illustration != '' ? $question->illustration:''}}">
      @foreach ($question->propositions as $proposition)
         <input name="reponse_1" type="text" value="{{$proposition['name'] != '' ? $proposition['name']:''}}">
      @endforeach
      @if ($question->id)
         <input type="hidden" name="id" value="{{$question->id}}" >
      @endif
   </form>
@endforeach

