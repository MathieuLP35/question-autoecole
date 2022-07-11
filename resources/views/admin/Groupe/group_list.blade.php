<x-app-layout>
    <x-slot name="header">
        <h2 class="breadcrump">
            <a title="Acceuil backend"class="backend hover:underline"href="{{ route('admin') }}" :active="request()->routeIs('admin')">{{ __('Administration') }}</a>&nbsp;/&nbsp;Groupe&nbsp;❓
        </h2>
    </x-slot>

<div class="table-container">
    <H3>Liste des groupes</H3>
    <table class="admin-table">
        <thead class="">
            {{-- text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 --}}
            <th class="">Nom du groupe</th>
            <th class="">Moyenne du groupe</th>
            <th class=""></th>
            <th class=""></th>
            <th class=""></th>
            <th class=""><a id="btn-grplist" class="btn-green" href="{{url('admin/groupe/create')}}">Ajouter un groupe</a></th>

        </thead>

        <tbody>
            @foreach ($groupes as $groupe)
            <tr class="">
                <td class="groupname">{{ $groupe->groupname }}</td>
                <td class="">{{ $groupe->moy }}</td>
                <td class="oeil"> <a href="{{ route('groupe.show', ['groupe' => $groupe->id]) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/></svg></a></td>
                <td > <a class="btn-blue" href="{{ route('groupe.edit', ['groupe' => $groupe->id]) }}">Editer</a></td>
                <td class="">
                    <form action="{{url('admin/groupe/'.$groupe->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button data-confirm="Supprimer le groupe ?"type="submit" title="Supprimer la question ?"
                            class="btn-red validate btnDel" onclick="DeleteRow(1)">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

    {{-- <a id="btn-grplist" class="btn-green" href="{{url('admin/groupe/create')}}">Ajouter un groupe</a> --}}



</x-app-layout>
