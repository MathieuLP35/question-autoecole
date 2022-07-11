<x-app-layout>
    <x-slot name="header">
        <h2 class="breadcrump">
			<a title="Acceuil backend"class="backend hover:underline"href="{{ route('admin') }}" :active="request()->routeIs('admin')">{{ __('Administration') }}</a>&nbsp;/&nbsp;Utilisateur&nbsp;❓
        </h2>
    </x-slot>
	@if (isset($user))
	
	<div class="stat-corps container">
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
				Moyenne
			</p>
			<p>
				{{$moyenne}} % de reussite
			</p>
		</div>
		<div class="stat-label">Historique des Résultats</div>
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
