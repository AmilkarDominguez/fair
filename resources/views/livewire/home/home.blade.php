<div>
    {{--navbar--}}
    <section class="z-10 fixed top-0 flex justify-between p-4 border shadow-md w-full bg-gray-100 h-20">
        <div class="flex justify-center items-center">
            <img class="h-10"
                 src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="logo">
        </div>

        <div class="flex gap-2">
            <a href=""
               class="flex justify-center items-center px-4 rounded-full cursor-pointer hover:bg-primary-500 hover:text-white">Registrarse</a>
            <a href=""
               class="flex justify-center items-center px-4 rounded-full cursor-pointer hover:bg-primary-500 hover:text-white">Ingresar</a>
        </div>
    </section>
    {{--end navbar--}}
    {{--banner--}}
    <section class="static mt-20 w-full bg-blue-400 h-auto flex">
        <img class="object-cover w-full" alt="bg"
             src="/images/home-banner/banner-tarija.png">
        <section class="absolute w-full h-96 flex items-center justify-between">
            <section class="text-white ml-4">
                <button class="bg-gray-800 bg-opacity-25 rounded-full p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/>
                    </svg>
                </button>
            </section>
            <section class="text-6xl font-bold text-white mr-4">
                <button class="bg-gray-800 bg-opacity-25 rounded-full p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                    </svg>
                </button>
            </section>
        </section>
    </section>
    {{--end banner--}}
    {{--pavilions--}}
    <section class="mt-8 w-full flex flex-col items-center gap-2">
        <section class="font-bold text-gray-800 text-4xl text-center">
            Visita nuestros pabellones
        </section>
        <section class="flex gap-2 w-full sm:w-1/2 overflow-x-scroll py-4">
            <section class="flex gap-2">
                @foreach($pavilions as $pavilion)
                    <a href="{{ route('pavilion.detail', $pavilion->slug) }}"
                        class="h-52 w-52 gap-2 flex flex-col items-center justify-center  border rounded-md bg-white cursor-pointer transition transform hover:scale-95 hover:bg-primary-50 hover:bg-opacity-10">
                        @if($pavilion->photo)
                            <img alt="icon" class="object-cover w-36 rounded-lg" src="{{ asset($pavilion->photo) }}">
                        @else
                            <img alt="icon" class="object-cover w-36 rounded-lg" src="{{ asset('/images/icons/icon_default.svg') }}">
                        @endif
                        <section class="text-primary-500 font-bold text-center">
                            {{$pavilion->name}}
                        </section>
                    </a>
                @endforeach
            </section>
        </section>
    </section>
    {{--end pavilions--}}
    {{--steps--}}
    <section class="mt-12 w-full flex flex-col items-center gap-2">
        <section class="font-bold text-gray-800 text-4xl text-center">
            ¿Cómo obtener un stand?
        </section>
        <section class="w-40 h-1 rounded-full bg-gray-500 my-3">
        </section>
        <x-home.register-steps></x-home.register-steps>
    </section>
    {{--end steps--}}
    {{--steps--}}
    <section class="mt-12 w-full flex flex-col items-center gap-2">
        <section class="font-bold text-gray-800 text-4xl text-center">
            Misión
        </section>
        <section class="w-1/2 text-gray-800 text-2xl text-center">
            “Promover y difundir la rica cultura y tradiciones de Tarija, a través de la exposición y venta de productos
            artesanales, gastronomía típica, música, danzas y otros elementos culturales.”
        </section>
    </section>
    {{--end steps--}}
    {{--know--}}
    <section class="mt-20 w-full flex flex-col items-center gap-2">
        <section class="w-1/2 flex">
            <section class="w-1/2 h-28 text-primary-500 font-black text-3xl text-left flex items-center mr-10">
                ¿Sabias que Fexpo Tarija conecta muchas empresas
                con clientes potenciales?
            </section>
            <section class="w-1/2 flex gap-2">
                <section class="border rounded w-28 h-28 flex justify-center items-center flex-col">
                    <section class="text-green-400 text-xl font-black">800</section>
                    <section class="text-sm">STANDS</section>
                </section>
                <section class="border rounded w-28 h-28 flex justify-center items-center flex-col">
                    <section class="text-green-400 text-xl font-black">700.140</section>
                    <section class="text-sm">VISITAS</section>
                </section>
                <section class="border rounded w-28 h-28 flex justify-center items-center flex-col">
                    <section class="text-green-400 text-xl font-black">15</section>
                    <section class="text-sm">PABELLONES</section>
                </section>
                <section class="border rounded w-28 h-28 flex justify-center items-center flex-col">
                    <section class="text-green-400 text-xl font-black">520.679</section>
                    <section class="text-sm">PRODUCTOS</section>
                </section>
            </section>
        </section>
    </section>
    {{--end know--}}
    {{--vision--}}
    <section class="mt-20 w-full flex flex-col items-center gap-2">
        <section class="w-1/2 bg-primary-100 rounded-md text-white flex item-center justify-between p-6">
            <section class="flex flex-col gap-4 w-9/12">
                <section class="font-bold text-4xl">
                    Visión
                </section>
                <section>
                    Impulsar el comercio local, promoviendo la venta de productos y servicios producidos en la región, y generando nuevas oportunidades de negocio para los comerciantes y emprendedores locales.
                </section>
            </section>
            <section class="flex justify-center items-center ">
                <a class="bg-white rounded text-primary-500 px-4 py-2"  href="{{ route('stand.request') }}">OBTENER STAND</a>
            </section>
        </section>
    </section>
    {{--end vision--}}

    <footer class="footer mt-20 border-b-4 border-primary-500 bottom-0 left-0 w-full">
        <div class="container mx-auto">
            <div class="flex flex-col text-xl items-center">
                <div class="sm:w-2/3 text-center">
                    <section class="flex flex-col gap-2">
                        <p class="text-gray-500">Contáctanos:</p>
                        <p><b>Dirección <i class="fas fa-map-marker-alt"></i> : </b>{{ $information->direction }}</p>
                        <p><b>Teléfono <i class="fas fa-phone-alt"></i> : </b>{{ $information->phone }}</p>
                        <p><b>Whatsapp <i class="fab fa-whatsapp"></i> : </b>{{ $information->whatsapp }}</p>
                        <p><b>Correo <i class="fas fa-envelope"></i> : </b>{{ $information->email }}</p>
                    </section>
                    <section class="mt-10 flex flex-col gap-4">
                        <span class="text-gray-500">Síguenos en nuestras redes:</span>
                        <section class=" flex gap-4 items-center justify-center">
                            <a href="{{ $information->facebook }}" class="text-primary-500 text-4xl" target="_blank"><i
                                    class="fab fa-facebook"></i></a>
                            <a href="{{ $information->instagram }}" class="text-primary-500 text-4xl" target="_blank"><i
                                    class="fab fa-instagram-square"></i></a>
                        </section>
                        <p class="text-sm text-primary-500 font-bold mb-2">
                            © {{ now()->year }} FERIA
                        </p>
                    </section>

                </div>
            </div>
        </div>
    </footer>
</div>
