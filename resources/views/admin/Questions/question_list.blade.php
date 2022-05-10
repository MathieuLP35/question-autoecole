<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administration') }}
        </h2>
    </x-slot>
    <div class="p-6 relative overflow-x-auto shadow-md sm:rounded-lg">
        <h3>Liste des Questions</h3>
        <a href="{{url('admin/question/create')}}">Ajouter une question</a>


        <table class="admin-table ">
            <thead class="">
                <tr>
                    <th scope="col" class="id-column">
                        id
                    </th>
                    <th scope="col" class="">
                        Intituler
                    </th>
                    <th scope="col" class="">
                        <span class="sr-only">Actions</span>
                    </th>
                    <th scope="col" class="">
                        <a class="btn-green" href="{{url('admin/question/create')}}">Ajouter une question</a>
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
                    <td><a href="{{ route('question.edit', ['question' => $question->id])}}" class="btn-blue">Editer</a></td>
                    <td class="">
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
