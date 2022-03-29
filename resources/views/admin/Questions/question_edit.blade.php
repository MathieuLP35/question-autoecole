<form action="{{url('admin/question/'.$user->id)}}" method="POST">
   @csrf
   @method('PUT')
   <input name="name" type="text" value="{{ $question->texte }}" placeholder="intituler de la question">
   <input name="image" type="file" value="{{ $question->image != '' ? $question->image:'' }}">
   @foreach ($question->propositions as $proposition)
      <input name="reponse_1" type="text" value="{{ $proposition['name'] != '' ? $proposition['name']:''}}">
   @endforeach
   <input type="submit" value="Editer">
</form>