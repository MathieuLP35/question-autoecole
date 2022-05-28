<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a title="Acceuil backend"class="backend hover:underline"href="{{ route('admin') }}" :active="request()->routeIs('admin')">{{ __('Administration') }}</a>&nbsp;/&nbsp;Scores&nbsp;❓
        </h2>
    </x-slot>
    <div class="p-6 relative overflow-x-auto shadow-md sm:rounded-lg">
        <h3>Liste des scores</h3>
        <table class="admin-table">
            <thead>
                <tr>
                    <th scope="col" class="id-column">
                        ID
                    </th>
                    <th scope="col" class="">
                        Resultat
                    </th>
                    <th scope="col" class="">
                        Utilisateur
                    </th>
                    <th scope="col" class="bloc_end">
                        <a class="btn-green" href="{{url('admin/score/create')}}">Ajouter</a>
                    </th>
                </tr>
            </thead>
            <tbody>
				@foreach ($scores as $score)
					<tr>
						<th scope="row" class="id-column">
							{{$score->id}}
						</th>
						<td>
							{{$score->moy}}
						</td>
						<td>
							{{$score->user->name}}
						</td>
						<td class="actions">
							<a href="{{url('admin/score/'.$score->id.'/edit')}}" class="btn-blue">Editer</a>
							<form action="{{url('admin/score/'.$score->id)}}" method="post">
								@csrf
								@method('DELETE')
								<input data-confirm="Supprimer le score ?" type="submit" class="btn-red validate" value="Supprimer">
							</form>
						</td>
					</tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
