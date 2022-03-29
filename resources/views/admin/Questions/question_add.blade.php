   <form action="{{url('admin/question')}}" method="POST">
      @csrf
      <input name="texte" type="text" placeholder="intitulé de la question">
      <input name="image" type="file">
         <input name="proposition_1" type="text">
         <input name="proposition_2" type="text">
         <input name="proposition_3" type="text">
         <input name="proposition_4" type="text">
         <input type="submit" class="submit" value="Ajouter">
   </form>

