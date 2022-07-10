<x-app-layout>
    <x-slot name="header">
        <h2 class="breadcrump">
            <a title="Acceuil backend" class="backend hover:underline" href="{{ route('admin') }}"
                :active="request()->routeIs('admin')">{{ __('Administration') }}</a>&nbsp;/&nbsp;Groupe&nbsp;❓
        </h2>
    </x-slot>

    <div class="table-container">

        <h3>Page du {{ $groupe->groupname }}</h3>

        <table class="admin-table">
            <thead>
                <th>Nom</th>
                <th>Mail</th>
                <th>Score</th>
            </thead>

            <tbody>
                @foreach ($users as $user)
                <tr class="">
                    <td scope="row" class="">
                        {{$user->name}}
                    </td>

                    <td class="">
                        {{$user->email}}
                    </td>
                    <td>
                        {{$groupe->moy}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>
