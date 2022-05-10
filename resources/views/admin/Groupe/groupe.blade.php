<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administration') }}
        </h2>
    </x-slot>

<h1>page {{ $groupe->groupname }}</h1>

<table>
    <thead>
        <th>
            <td>Nom</td>
            <td>Mail</td>
            <td>Score</td>
        </th>
    </thead>

    <tbody>
            @foreach ($users as $user)
                <tr class="">
                    <th scope="row" class="">
                        {{$user->name}}
                    </th>

                    <td class="">
                        {{$user->email}}
                    </td>
                </tr>
            @endforeach
    </tbody>
</table>

</x-app-layout>
