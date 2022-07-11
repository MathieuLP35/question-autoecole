<x-app-layout>
    <x-slot name="header">
        <h2 class="breadcrump">
            {{ __('Statistiques') }}
        </h2>
    </x-slot>
    @if (isset($user))
	<div class="container stat-corps">
		<div class="stat-label">
            <p>
                Profil :
            </p>
            <p>
                {{$user->name}}
            </p>
        </div>
		<div class="stat-label">
            <p>
                Votre moyenne : 
            </p>
            <p>
                {{$moyenne}} % de reussite
            </p>
        </div>
		<div class="stat-label">
            Historique des Résultats
        </div>
        <ul class="stat-list">
            @foreach ($scores as $score)
            <li class="stat-item">
                <p>
                    {{$score->moy}} % 
                </p>
                <p>
                    {{date('d/m/Y', strtotime($score->created_at))}}
                </p>
            </li>
            @endforeach
        </ul>
    </div>
	@endif

</x-app-layout>
