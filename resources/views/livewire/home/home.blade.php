<div>
    {{-- banner --}}
    <section class="static mt-20 w-full bg-blue-400 h-auto flex">
        <img class="object-cover w-full" alt="bg" src="/images/home-banner/banner-tarija.png">
        <section class="absolute w-full h-96 flex items-center justify-between">
            <section class="text-white ml-4">
                <button class="bg-gray-800 bg-opacity-25 rounded-full p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                </button>
            </section>
            <section class="text-6xl font-bold text-white mr-4">
                <button class="bg-gray-800 bg-opacity-25 rounded-full p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </button>
            </section>
        </section>
    </section>
    {{-- end banner --}}
    {{-- pavilions --}}
    <section class="mt-8 w-full flex flex-col items-center gap-2">
        <section class="font-bold text-gray-800 text-4xl text-center">
            Visita nuestros pabellones
        </section>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-2">

            @foreach ($pavilions as $pavilion)
                <div class="col-span-1 md:col-span-1">
                    <a href="{{ route('pavilion.detail', $pavilion->slug) }}"
                        class="h-52 w-52 gap-2 flex flex-col items-center justify-center  border rounded-md bg-white cursor-pointer transition transform hover:scale-95 hover:bg-primary-50 hover:bg-opacity-10">
                        @if ($pavilion->photo)
                            <img alt="icon" class="object-cover w-36 rounded-lg"
                                src="{{ asset($pavilion->photo) }}">
                        @else
                            <img alt="icon" class="object-cover w-36 rounded-lg"
                                src="{{ asset('/images/icons/icon_default.svg') }}">
                        @endif
                        <section class="text-primary-500 font-bold text-center">
                            {{ $pavilion->name }}
                        </section>
                    </a>
                </div>
            @endforeach
        </div>


    </section>
    {{-- end pavilions --}}
    {{-- steps --}}
    <section class="mt-12 w-full flex flex-col items-center gap-2">
        <section class="font-bold text-gray-800 text-4xl text-center">
            ¿Cómo obtener un stand?
        </section>
        <section class="w-40 h-1 rounded-full bg-gray-500 my-3">
        </section>
        <x-home.register-steps></x-home.register-steps>
    </section>
    {{-- end steps --}}
    {{-- steps --}}
    <section class="mt-12 w-full flex flex-col items-center gap-2">
        <section class="font-bold text-gray-800 text-4xl text-center">
            Misión
        </section>
        <section class="w-1/2 text-gray-800 text-2xl text-center">
            “Promover y difundir la rica cultura y tradiciones de Tarija, a través de la exposición y venta de productos
            artesanales, gastronomía típica, música, danzas y otros elementos culturales.”
        </section>
    </section>
    {{-- end steps --}}
    {{-- know --}}
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
                    <section class="text-green-400 text-xl font-black">{{count($pavilions)}}</section>
                    <section class="text-sm">PABELLONES</section>
                </section>
                <section class="border rounded w-28 h-28 flex justify-center items-center flex-col">
                    <section class="text-green-400 text-xl font-black">520.679</section>
                    <section class="text-sm">PRODUCTOS</section>
                </section>
            </section>
        </section>
    </section>
    {{-- end know --}}
    {{-- vision --}}
    <section class="mt-20 w-full flex flex-col items-center gap-2">
        <section class="w-1/2 bg-primary-100 rounded-md text-white flex item-center justify-between p-6">
            <section class="flex flex-col gap-4 w-9/12">
                <section class="font-bold text-4xl">
                    Visión
                </section>
                <section>
                    Impulsar el comercio local, promoviendo la venta de productos y servicios producidos en la región, y
                    generando nuevas oportunidades de negocio para los comerciantes y emprendedores locales.
                </section>
            </section>
            <section class="flex justify-center items-center ">
                <a class="bg-white rounded text-primary-500 px-4 py-2" href="{{ route('stand.request') }}">OBTENER
                    STAND</a>
            </section>
        </section>
    </section>
    {{-- end vision --}}


    @push('footer')
        <x-footer direction="{{ $information->direction }}" phone="{{ $information->phone }}"
            whatsapp="{{ $information->whatsapp }}" email="{{ $information->email }}"
            facebook="{{ $information->facebook }}" instagram="{{ $information->instagram }}">
        </x-footer>
    @endpush

</div>
