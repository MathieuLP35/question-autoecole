<x-app-layout>
    <x-slot name="header">
        <h2 class="breadcrump">
            {{ __('Administration') }}
        </h2>
    </x-slot>
    <main>
        <div class="node--admin-menu">
            <h1 class="node--admin-menu-titre">Panneau </br> de contrôle</h1>
            <div class="node--admin-menu-item">
                <div class="admin-menu-item">
                    <a href="{{url('admin/utilisateur')}}">Compte Utilisateur <div class="icone-admin-1"></div></a>
                </div>
                <div class="admin-menu-item">
                    <a href="{{url('admin/question')}}">Questions <div class="icone-admin-2"></div></a>
                </div>
                <div class="admin-menu-item">
                    <a href="{{url('admin/groupe')}}">Groupes <div class="icone-admin-3"></div></a>
                </div>
                <div class="admin-menu-item">
                    <a href="{{url('admin/score')}}">Scores <div class="icone-admin-4"></div></a>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>