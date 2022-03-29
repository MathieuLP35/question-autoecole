<form action="#" method="POST">
   @csrf
   @method('PUT')
   <input name="name" type="text" value="{{ $question->texte }}" placeholder="intituler de la question">
   <input name="image" type="file" value="{{ $question->image != '' ? $question->image:'' }}">
   @foreach ($question->propositions as $proposition)
      <input name="reponse_1" type="text" value="{{ $proposition['name'] != '' ? $proposition['name']:''}}">
   @endforeach
   @if ($question->id)
      <input type="hidden" name="id" value="{{ $question->id }}" >
   @endif
</form>