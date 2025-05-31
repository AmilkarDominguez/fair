<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FERIA') }}</title>
    {{-- <link rel="shortcut icon" href="{{ asset('favicon.ico') }}"> --}}
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">


    {{-- icons --}}
    <link rel="icon" href="{{ asset('/icon/favicon.ico') }}" sizes="any"><!-- 32×32 -->
    <link rel="icon" href="{{ asset('/icon/icon.svg') }}" type="image/svg+xml">
    <link rel="apple-touch-icon" href="{{ asset('/icon/apple-touch-icon.png') }}"><!-- 180×180 -->
    {{-- <link rel="manifest" href="{{ asset('/icon/manifest.webmanifest') }}"> --}}
    {{-- end icons --}}

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    @livewireStyles

    <!-- Scripts sweetalert2-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <x-livewire-alert::scripts />
    <!-- end sweetalert2-->

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>


    <script src="https://kit.fontawesome.com/d28e5f8122.js" crossorigin="anonymous"></script>
    
    @laravelPWA
</head>

<body class="font-sans w-full h-full">
    <header class="z-10 fixed top-0 flex justify-between p-4 border shadow-md w-full bg-gray-100 h-20">
        <div class="flex justify-center items-center">
            <img class="h-10" src="https://img.freepik.com/free-vector/gradient-tn-nt-logo-template_23-2149239308.jpg" alt="logo">
        </div>
        <div class="flex gap-2">
            <a href="/home"
            class="flex justify-center items-center px-4 rounded-full cursor-pointer hover:bg-primary-500 hover:text-white">Inicio</a>
            <a href="!#"
                class="flex justify-center items-center px-4 rounded-full cursor-pointer hover:bg-primary-500 hover:text-white">Registrarse</a>
            <a href="!#"
                class="flex justify-center items-center px-4 rounded-full cursor-pointer hover:bg-primary-500 hover:text-white">Ingresar</a>
        </div>
    </header>
    <main>
        {{ $slot }}
    </main>


    <footer class="footer bottom-0 left-0 mt-20 border-b-4 bg-gray-100 border-primary-500 w-full py-4">
        @stack('footer')        
    </footer>


    @stack('modals')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    @livewireScripts

    <script src="https://cdn.jsdelivr.net/npm/chart.js@latest/dist/Chart.min.js"></script>

    @stack('custom-scripts')

</body>

</html>
