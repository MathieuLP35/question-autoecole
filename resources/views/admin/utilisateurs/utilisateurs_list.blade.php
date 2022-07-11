<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a title="Acceuil backend"class="backend hover:underline"href="{{ route('admin') }}" :active="request()->routeIs('admin')">{{ __('Administration') }}</a>&nbsp;/&nbsp;Utilisateur&nbsp;❓
        </h2>
    </x-slot>
    <div class="p-6 relative overflow-x-auto shadow-md sm:rounded-lg">
        <h3>Liste des Utilisateurs</h3>
        <table class="admin-table">
            <thead>
                <tr>
                    <th scope="col" >
                        Nom
                    </th>
                    <th scope="col">
                        Email
                    </th>
                    <th scope="col">
                        Role
                    </th>
                    <th scope="col">
                        Groupe
                    </th>
                    <th scope="col" class="bloc_end">
						<a class="btn-green" href="{{url('admin/utilisateur/create')}}">Ajouter un utilisateur</a>
                    </th>
            </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
					<tr>
						<td scope="row" >
							{{$user->name}}
						</td>
						<td>
							{{$user->email}}
						</td>
						<td>
							{{$user->role}}
						</td>
						<td>
							{{$user->groupe->groupname}}
						</td>
						<td class="actions">
                            <a href="{{ route('utilisateur.show', ['utilisateur' => $user->id]) }}" title="Simuler la question">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/></svg>
                            </a>
							<a href="{{url('admin/utilisateur/'.$user->id.'/edit')}}" class="btn-blue">Editer</a>
							<form action="{{url('admin/utilisateur/'.$user->id)}}" method="post">
								@csrf
								@method('DELETE')
                                <button type="submit" data-confirm="Supprimer l'utilisateur ?" title="Supprimer l'utilisateur ?"class="btn-red validate">Supprimer</button>
							</form>
						</td>
					</tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
