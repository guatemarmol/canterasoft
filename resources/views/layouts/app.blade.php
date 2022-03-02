<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

        <!-- Styles -->
       <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet"/>
        @livewireStyles
        <link rel="stylesheet" href="{{ asset('assets/css/pushbar.css') }}"/>
    <!--    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>

        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"/>

        <link rel="stylesheet" href="{{ asset('assets/css/fonts.css') }}"/>  -->



     <!--   <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}"/>

        <link rel="stylesheet" href="{{ asset('assets/css/estilos.css') }}"/>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

        <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_orange.css">



        <link href="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.css" rel="stylesheet"> -->


        <!-- Scripts -->
      <script src="{{ mix('js/app.js') }}" defer></script>
       <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>

       <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.2.1/jquery.quicksearch.js"></script>
        <script src="{{ asset('js/pushbar.js') }}" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    </head>
    <body class="font-sans antialiased bg-light">
        <x-jet-banner />
        @livewire('navigation-menu')
        <!-- Page Heading -->
        <header class="d-flex py-3 bg-white shadow-sm border-bottom">
            <div class="container">
                {{ $header }}
            </div>

        </header>

        <!-- Page Content -->
        <main class="container my-5">
            {{ $slot }}
        </main>

        @stack('modals')

        @livewireScripts

        @stack('scripts')
    </body>
</html>
