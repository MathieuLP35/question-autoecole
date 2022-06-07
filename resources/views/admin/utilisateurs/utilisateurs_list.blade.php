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
                    <th scope="col" class="id-column">
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
						<td scope="row" class="id-column">
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
							<a href="{{url('admin/utilisateur/'.$user->id.'/edit')}}" class="btn-blue">Editer</a>
							<form action="{{url('admin/utilisateur/'.$user->id)}}" method="post">
								@csrf
								@method('DELETE')
								<input data-confirm="Supprimer l'utilisateur ?" type="submit" value="Supprimer" class="btn-red validate">
							</form>
						</td>
					</tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
