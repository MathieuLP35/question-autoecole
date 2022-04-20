<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administration') }}
        </h2>
    </x-slot>
    <div class="p-6 relative overflow-x-auto shadow-md sm:rounded-lg">
        <h3>Liste des Questions</h3>
        <a href="{{url('admin/question/create')}}">Ajouter une question</a>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Intituler
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Actions</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($questions as $question)
                <tr class="bg-white dark:bg-gray-800">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        {{$question->id}}
                    </th>
                    <td class="px-6 py-4">
                        {{$question->texte}}
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('question.edit', ['question' => $question->id])}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editer</a>
                        <form action="{{url('admin/question/'.$question->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="Supprimer la question ?"class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
