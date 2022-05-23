<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <a title="Acceuil backend"class="backend hover:underline"href="{{ route('admin') }}" :active="request()->routeIs('admin')">{{ __('Administration') }}</a>&nbsp;/&nbsp;Questions&nbsp;❓
        </h2>
    </x-slot>
    <div class="p-6 relative overflow-x-auto shadow-md sm:rounded-lg">
        <h3>Liste des Questions</h3>
        {{-- <a href="{{url('admin/question/create')}}">Ajouter une question</a> --}}


        <table class="admin-table ">
            <thead class="">
                <tr>
                    <th scope="col" class="id-column">
                        id
                    </th>
                    <th scope="col" class="">
                        Intituler
                    </th>
					<th></th>
                    <th scope="col" class="">
                        <span class="sr-only">Actions</span>
                    </th>
                    <th scope="col" class="bloc_end">
                        <a class="btn-green" href="{{url('admin/question/create')}}">Ajouter</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($questions as $question)
                <tr class="">
                    <td scope="row" class="id-column">
                        {{$question->id}}
                    </td>
                    <td class="">
                        {{$question->texte}}
                    </td>
					<td class="actions"> 
                        <a href="{{ route('question.show', ['question' => $question->id]) }}" title="Simuler la question">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/></svg></a>
                        <a href="{{ route('question.edit', ['question' => $question->id])}}" class="btn-blue">Editer</a>
                        <form action="{{url('admin/question/'.$question->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="Supprimer la question ?"class="btn-red">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
