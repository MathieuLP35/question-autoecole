<form action="{{url('admin/Utilisateur/'.$user->id)}}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="name" id="name" value="{{ $user->name }}" />
    <input type="text" name="email" id="email" value="{{ $user->email }}" />
    <select name="role" id="role">
        <option value="1">Utilisateur</option>
        <option value="3">Administrateur</option>
    </select>
    <input type="submit" value="Editer">
</form>