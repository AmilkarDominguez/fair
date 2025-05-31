<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <title>{{ config('app.name', 'SAMA') }}</title>
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

<body class="font-sans">
    <!-- component -->
    <div class="md:flex flex-col md:flex-row md:min-h-screen w-full">
        <div @click.away="open = false"
            class="flex flex-col w-full md:w-64 text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-primary-800 flex-shrink-0"
            x-data="{ open: false }">
            {{-- <img src="/images/logo.png" alt=""  class=" p-6"> --}}
            <div class="flex-shrink-0 px-8 py-4 flex flex-row items-center justify-between">

                <a href="{{ route('dashboard') }}"
                    class="text-xl font-semibold tracking-widest text-primary-500 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">
                    <i class="fas fa-tachometer-alt"></i> FEXPOTARIJA</a>

                <a class="rounded-lg md:hidden focus:outline-none focus:shadow-outline cursor-pointer"
                    @click="open = !open">

                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">

                        <path x-show="!open" fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>

                        <path x-show="open" fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
            <nav :class="{ 'block': open, 'hidden': !open }"
                class="flex-grow md:block px-4 pb-4 md:pb-0 md:overflow-y-auto">



                {{-- <x-a-sidenav href="{{ route('category.dashboard') }}"
                    :active="request()->routeIs('category.dashboard') || request()->routeIs('category.create') || request()->routeIs('category.update')">
                    {{ __('menu.category') }}
                </x-a-sidenav> --}}

                {{-- Options Admin Reader --}}
                @if (Auth::user()->hasAnyRole(['admin', 'reader']))
                @endif

                {{-- Options Admin --}}
                @if (Auth::user()->hasRole('admin'))
                @endif





                {{-- <x-a-sidenav href="{{ route('sale.table') }}" :active="request()->routeIs('sale.table')">
                    {{ __('menu.sale') }}
                </x-a-sidenav> --}}

                {{-- <x-a-sidenav href="{{ route('setting.update', 'setting') }}"
                    :active="request()->routeIs('setting.dashboard') || request()->routeIs('setting.update')">
                    {{ __('menu.setting') }}
                </x-a-sidenav> --}}

                @if (Auth::user()->hasRole('admin'))
                    {{-- start settings --}}
                    <div @click.away="open = false" class="relative z-10" x-data="{ open: false }">
                        <a @click="open = !open"
                            class="flex flex-row items-center content-between w-full px-4 py-2 mt-2 text-gray-500  text-sm font-semibold text-left bg-transparent rounded-full dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-primary-600 dark-mode:hover:bg-primary-600 md:block hover:text-primary-500 focus:text-primary-500 hover:bg-primary-200 ">
                            <div class="w-full flex justify-between ">
                                <div class="flex space-x-2 ">

                                    <div class="flex h-full items-center ">
                                        <span class="inline-block align-middle"><i class="fas fa-cogs"></i>
                                            Administración</span>
                                    </div>

                                </div>
                                <div class="flex space-x-2 ">
                                    <div class="flex h-full justify-center items-center">
                                        <svg fill="currentColor" viewBox="0 0 20 20"
                                            :class="{ 'rotate-180': open, 'rotate-0': !open }"
                                            class="w-6 h-6 transition-transform duration-200 transform">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class=" right-0 w-full mt-2 origin-top-right rounded-md shadow-lg">
                            <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-primary-800">

                                <x-a-sidenav href="{{ route('user.dashboard') }}" :active="request()->routeIs('user.dashboard') ||
                                    request()->routeIs('user.create') ||
                                    request()->routeIs('user.update')">
                                    <i class="fas fa-users-cog"></i> Usuarios
                                </x-a-sidenav>
                                <x-a-sidenav href="{{ route('role.dashboard') }}" :active="request()->routeIs('role.dashboard') ||
                                    request()->routeIs('role.create') ||
                                    request()->routeIs('role.update')">
                                    <i class="fas fa-users-cog"></i> Roles
                                </x-a-sidenav>


                                {{-- <x-a-sidenav href="{{ route('unread.dashboard') }}"
                                :active="request()->routeIs('unread.dashboard') || request()->routeIs('unread.create') || request()->routeIs('unread.update')">
                                QUITAR No lecturas
                            </x-a-sidenav> --}}


                            </div>
                        </div>
                    </div>
                    {{-- end settings --}}
                    {{-- start inventario --}}
                    <div @click.away="open = false" class="relative z-10" x-data="{ open: false }">
                        <a @click="open = !open"
                            class="flex flex-row items-center content-between w-full px-4 py-2 mt-2 text-gray-500  text-sm font-semibold text-left bg-transparent rounded-full dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-primary-600 dark-mode:hover:bg-primary-600 md:block hover:text-primary-500 focus:text-primary-500 hover:bg-primary-200 ">
                            <div class="w-full flex justify-between ">
                                <div class="flex space-x-2 ">

                                    <div class="flex h-full items-center ">
                                        <span class="inline-block align-middle"><i class="fas fa-cogs"></i>
                                            Registros</span>
                                    </div>

                                </div>
                                <div class="flex space-x-2 ">
                                    <div class="flex h-full justify-center items-center">
                                        <svg fill="currentColor" viewBox="0 0 20 20"
                                            :class="{ 'rotate-180': open, 'rotate-0': !open }"
                                            class="w-6 h-6 transition-transform duration-200 transform">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class=" right-0 w-full mt-2 origin-top-right rounded-md shadow-lg">
                            <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-primary-800">

                                <x-a-sidenav href="{{ route('fair.dashboard') }}" :active="request()->routeIs('fair.dashboard') ||
                                    request()->routeIs('fair.create') ||
                                    request()->routeIs('fair.update')">
                                    <i class="fas fa-users-cog"></i> Ferias
                                </x-a-sidenav>

                                <x-a-sidenav href="{{ route('pavilion.dashboard') }}" :active="request()->routeIs('pavilion.dashboard') ||
                                    request()->routeIs('pavilion.create') ||
                                    request()->routeIs('pavilion.update')">
                                    <i class="fas fa-users-cog"></i> Pabellones
                                </x-a-sidenav>

                                <x-a-sidenav href="{{ route('stand-request.dashboard') }}" :active="request()->routeIs('stand-request.dashboard') ||
                                    request()->routeIs('stand-request.create')">
                                    <i class="fas fa-users-cog"></i> Solicitudes de Stands
                                </x-a-sidenav>

                                <x-a-sidenav href="{{ route('stand.dashboard') }}" :active="request()->routeIs('stand.dashboard') || request()->routeIs('stand.create')">
                                    <i class="fas fa-users-cog"></i> Stands
                                </x-a-sidenav>

                                <x-a-sidenav href="{{ route('product-category.dashboard') }}" :active="request()->routeIs('product-category.dashboard') ||
                                    request()->routeIs('product-category.create') ||
                                    request()->routeIs('product-category.update')">
                                    <i class="fas fa-users-cog"></i> Categorías de Productos
                                </x-a-sidenav>

                                <x-a-sidenav href="{{ route('product.dashboard') }}" :active="request()->routeIs('product.dashboard') ||
                                    request()->routeIs('product.create') ||
                                    request()->routeIs('product.update')">
                                    <i class="fas fa-users-cog"></i> Productos
                                </x-a-sidenav>

                                <x-a-sidenav href="{{ route('webinar.dashboard') }}" :active="request()->routeIs('webinar.dashboard') ||
                                    request()->routeIs('webinar.create') ||
                                    request()->routeIs('webinar.update')">
                                    <i class="fas fa-users-cog"></i> Webinars
                                </x-a-sidenav>

                                <x-a-sidenav href="{{ route('publication.dashboard') }}" :active="request()->routeIs('publication.dashboard') ||
                                    request()->routeIs('publication.create')">
                                    <i class="fas fa-users-cog"></i> Publicaciones
                                </x-a-sidenav>


                                <x-a-sidenav href="{{ route('type-company.dashboard') }}" :active="request()->routeIs('type-company.dashboard') ||
                                    request()->routeIs('type-company.create')">
                                    <i class="fas fa-users-cog"></i> Tipo de empresas
                                </x-a-sidenav>

                                <x-a-sidenav href="{{ route('business-wheel.dashboard') }}" :active="request()->routeIs('business-wheel.dashboard') ||
                                    request()->routeIs('business-wheel.update')">
                                    <i class="fas fa-users-cog"></i> Rueda de negocios
                                </x-a-sidenav>
                            </div>
                        </div>
                    </div>
                    {{-- end inventario --}}
                @endif

                <hr class=" my-2">

                {{-- profile options --}}
                <div @click.away="open = false" class="relative z-30" x-data="{ open: false }">
                    <a @click="open = !open"
                        class="flex flex-row items-center content-between w-full px-4 py-2 mt-2 text-gray-500  text-sm font-semibold text-left bg-transparent rounded-full dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-primary-600 dark-mode:hover:bg-primary-600 md:block hover:text-primary-500 focus:text-primary-500 hover:bg-primary-200 ">
                        <div class="w-full flex justify-between ">
                            <div class="flex space-x-2 ">

                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <div
                                        class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                        <img class="h-8 w-8 rounded-full object-cover"
                                            src="{{ Auth::user()->profile_photo_url }}"
                                            alt="{{ Auth::user()->person->name }}" />
                                    </div>
                                    <div class="flex h-full justify-center items-center ">
                                        <span
                                            class="inline-block align-middle">{{ Auth::user()->name }}{{ Auth::user()->person->name }}</span>
                                    </div>
                                @else
                                    <div
                                        class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">

                                        <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div class="flex h-full justify-center items-center ">
                                        <span
                                            class="inline-block align-middle">{{ Auth::user()->person->name }}</span>
                                    </div>
                                @endif

                            </div>
                            <div class="flex space-x-2 ">
                                <div class="flex h-full justify-center items-center">
                                    <svg fill="currentColor" viewBox="0 0 20 20"
                                        :class="{ 'rotate-180': open, 'rotate-0': !open }"
                                        class="w-6 h-6 transition-transform duration-200 transform">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>

                        </div>
                    </a>
                    <div x-show="open" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg">
                        <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-primary-800">

                            <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-full dark-mode:bg-transparent dark-mode:hover:bg-primary-600 dark-mode:focus:bg-primary-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-primary-500 focus:text-primary-500 hover:bg-primary-200 "
                                href="{{ route('profile.show') }}">{{ __('menu.profile') }}</a>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-full dark-mode:bg-transparent dark-mode:hover:bg-primary-600 dark-mode:focus:bg-primary-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-primary-500 focus:text-primary-500 hover:bg-primary-200 "
                                    href="{{ route('api-tokens.index') }}">API Tokens</a>
                            @endif

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                this.closest('form').submit();"
                                    class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-full dark-mode:bg-transparent dark-mode:hover:bg-primary-600 dark-mode:focus:bg-primary-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-primary-500 focus:text-primary-500 hover:bg-primary-200 "
                                    href="#">{{ __('menu.logout') }}</a>
                            </form>

                        </div>
                    </div>
                </div>
                {{-- end profile options --}}





                {{-- <div @click.away="open = false" class="relative " x-data="{ open: false }">
                    <a @click="open = !open"
                        class="flex flex-row items-center content-between w-full px-4 py-2 mt-2 text-gray-500  text-sm font-semibold text-left bg-transparent rounded-full dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-primary-600 dark-mode:hover:bg-primary-600 md:block hover:text-primary-500 focus:text-primary-500 hover:bg-primary-200 ">
                        <div class="w-full flex justify-between ">
                            <span>Opción 5</span>
                            <svg fill="currentColor" viewBox="0 0 20 20"
                                :class="{'rotate-180': open, 'rotate-0': !open}"
                                class="w-4 h-4 transition-transform duration-200 transform">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </a>
                    <div x-show="open" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg">
                        <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-primary-800">
                            <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-full dark-mode:bg-transparent dark-mode:hover:bg-primary-600 dark-mode:focus:bg-primary-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-primary-500 focus:text-primary-500 hover:bg-primary-200 "
                                href="#">Opción 5.1</a>
                            <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-full dark-mode:bg-transparent dark-mode:hover:bg-primary-600 dark-mode:focus:bg-primary-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-primary-500 focus:text-primary-500 hover:bg-primary-200 "
                                href="#">Opción 5.2</a>
                            <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-full dark-mode:bg-transparent dark-mode:hover:bg-primary-600 dark-mode:focus:bg-primary-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-primary-500 focus:text-primary-500 hover:bg-primary-200 "
                                href="#">Opción 5.3</a>
                        </div>
                    </div>
                </div> --}}

            </nav>
        </div>



        {{-- content dashboard --}}
        <div class="bg-gray-200 w-full min-h-screen">

            {{-- header content --}}
            <div class="w-full px-4 sm:px-6 lg:px-8 bg-white">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <h1
                                class="inline-flex items-center px-1 pt-1 text-lg font-medium leading-5 text-primary-500 focus:outline-none focus:border-primary-700 transition duration-150 ease-in-out">
                                {{ $header }}
                                <h1>

                        </div>
                    </div>
                </div>
            </div>
            {{-- end header content --}}


            <main>
                {{ $slot }}
            </main>
        </div>
        {{-- content dashboard --}}
    </div>

    @stack('modals')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    @livewireScripts

    <script src="https://cdn.jsdelivr.net/npm/chart.js@latest/dist/Chart.min.js"></script>


    @stack('custom-scripts')

</body>

</html>
