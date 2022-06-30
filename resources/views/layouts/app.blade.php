<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Breizh Auto Skol - Code de la route en ligne') }}</title>
    <!-- Icone -->
    <link rel="shortcut icon" sizes="114x114" href="{{ asset('images/favicon.ico') }}">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700&display=swap" rel="stylesheet">

    @livewireStyles

    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>

  
  <body class="font-sans antialiased">
    <x-jet-banner />
    <div class="min-h-screen bg-gray-100">
      @livewire('navigation-menu')
      <!-- Page Heading -->
      @if (isset($header))
      <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
          {{ $header }}
        </div>
      </header>
      @endif
      <!-- Page Content -->
      <main>
        {{ $slot }}
      </main>
    </div>

    <x-footer class="text-sm">
        Footer
    </x-footer>

    @stack('modals')
    @livewireScripts
  </body>
</html>