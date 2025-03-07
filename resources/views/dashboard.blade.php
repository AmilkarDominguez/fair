<x-app-layout>
    <x-slot name="header">
        <div class="font-semibold text-xl text-gray-800 leading-tight">
            Bienvenido
        </div>
    </x-slot>

    {{-- <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot> --}}



    <div class="my-12 sm:px-6 lg:px-8">


        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">

            {{-- start card --}}

            <div class="w-full h-32 bg-white rounded-lg shadow-xl p-4">
                <div class="grid grid-cols-2 gap-2 ">
                    <div>
                        <h1 class=" text-sm uppercase text-gray-400">Registros totales</h1>
                        <h1 class=" text-lg font-bold uppercase ">72592</h1>
                    </div>
                    <div class="flex justify-end">
                        <div
                            class="h-12 w-12 bg-gradient-to-r from-red-400 to-yellow-500 text-white text-center rounded-full">
                            <i class="fas fa-database mt-4"></i>
                        </div>

                    </div>
                </div>
                <p class=" mt-7 text-sm font-light"><span class="text-green-500"><i class="fas fa-arrow-up"></i>
                        1.28%</span> Desde el mes pasado</p>
            </div>

            {{-- end card --}}


            {{-- start card --}}

            <div class="w-full h-32 bg-white rounded-lg shadow-xl p-4">
                <div class="grid grid-cols-2 gap-2 ">
                    <div>
                        <h1 class=" text-sm uppercase text-gray-400">Clientes nuevos</h1>
                        <h1 class=" text-lg font-bold uppercase ">2356</h1>
                    </div>
                    <div class="flex justify-end">
                        <div
                            class="h-12 w-12 bg-gradient-to-r from-red-400 to-pink-500 text-white text-center rounded-full">
                            <i class="fas fa-user-friends mt-4"></i>
                        </div>

                    </div>
                </div>
                <p class=" mt-7 text-sm font-light"><span class="text-green-500"><i class="fas fa-arrow-up"></i>
                        3.48%</span> Desde el mes pasado</p>
            </div>

            {{-- end card --}}

            {{-- start card --}}

            <div class="w-full h-32 bg-white rounded-lg shadow-xl p-4">
                <div class="grid grid-cols-2 gap-2 ">
                    <div>
                        <h1 class=" text-sm uppercase text-gray-400">Direcciones</h1>
                        <h1 class=" text-lg font-bold uppercase ">62212</h1>
                    </div>
                    <div class="flex justify-end">
                        <div
                            class="h-12 w-12 bg-gradient-to-r from-green-400 to-blue-500 text-white text-center rounded-full">
                            <i class="fas fa-house-user mt-4"></i>
                        </div>

                    </div>
                </div>
                <p class=" mt-7 text-sm font-light"><span class="text-green-500"><i class="fas fa-arrow-up"></i>
                        3.48%</span> Desde el mes pasado</p>
            </div>

            {{-- end card --}}

            {{-- start card --}}

            <div class="w-full h-32 bg-white rounded-lg shadow-xl p-4">
                <div class="grid grid-cols-2 gap-2 ">
                    <div>
                        <h1 class=" text-sm uppercase text-gray-400">Vigentes</h1>
                        <h1 class=" text-lg font-bold uppercase ">4200</h1>
                    </div>
                    <div class="flex justify-end">
                        <div
                            class="h-12 w-12 bg-gradient-to-r from-purple-400 to-pink-500 text-white text-center rounded-full">
                            <i class="fas fa-calendar-check mt-4"></i>
                        </div>

                    </div>
                </div>
                <p class=" mt-7 text-sm font-light"><span class="text-green-500"><i class="fas fa-arrow-up"></i>
                        3.48%</span> Desde el mes pasado</p>
            </div>

            {{-- end card --}}


        </div>



        {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div> --}}
        {{-- <div class=" border">
            <div class="bg-white  shadow-xl sm:rounded-lg p-8 h-80 border">

                <canvas id="grafica1" width="70px"></canvas>


            </div>
        </div> --}}


    </div>



    {{-- <div class="flex flex-row bg-red-500 m-8 p-4">
        <div class="bg-blue-500 m-2 p-4 sm:w-1/3 w-full">1</div>
        <div class="bg-blue-500 m-2 p-4 sm:w-1/3 w-full">2</div>
        <div class="bg-blue-500 m-2 p-4 sm:w-1/3 w-full">3</div>
    </div> --}}




    <div class="my-12 sm:px-6 lg:px-8">


        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            {{-- start card --}}

            <div class=" bg-white rounded-lg shadow-xl p-4 sm:col-span-2 col-span-3">

                <canvas id="grafica1" height="200px"></canvas>

            </div>

            {{-- end card --}}
            <div class=" bg-white rounded-lg shadow-xl p-4 sm:col-span-1 col-span-3 ">

                {{-- <canvas id="grafica2" width="400" height="600"></canvas> --}}


                <canvas id="grafica2" height="435px"></canvas>



            </div>
        </div>
    </div>

    @push('custom-scripts')
        <script>
            chart_1();
            chart_2();

            function chart_1() {
                // Obtener una referencia al elemento canvas del DOM
                const $grafica = document.querySelector("#grafica1");
                // Las etiquetas son las que van en el eje X. 
                const etiquetas = ["Enero", "Febrero", "Marzo", "Abril"]
                // Podemos tener varios conjuntos de datos. Comencemos con uno
                const datosVentas2020 = {
                    label: "Ventas por mes",
                    data: [5000, 1500, 8000,
                        5102
                    ], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
                    backgroundColor: 'rgba(104, 117, 245, 0.2)', // Color de fondo
                    borderColor: 'rgba(104, 117, 245, 1)', // Color del borde

                    borderWidth: 1, // Ancho del borde
                };
                new Chart($grafica, {
                    type: 'line', // Tipo de gráfica
                    data: {
                        labels: etiquetas,
                        datasets: [
                            datosVentas2020,
                            // Aquí más datos...
                        ]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }],
                        },
                    }
                });
            }

            function chart_2() {
                // Obtener una referencia al elemento canvas del DOM
                const $grafica = document.querySelector("#grafica2");
                // Las etiquetas son las que van en el eje X. 
                const etiquetas = ["Enero", "Febrero", "Marzo", "Abril"]
                // Podemos tener varios conjuntos de datos. Comencemos con uno
                const datosVentas2020 = {
                    label: "Ventas por mes",
                    data: [5000, 1500, 8000,
                        5102
                    ], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
                    backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color de fondo
                    borderColor: 'rgba(54, 162, 235, 1)', // Color del borde

                    borderWidth: 1, // Ancho del borde
                };
                new Chart($grafica, {
                    responsive: true,
                    type: 'bar', // Tipo de gráfica
                    data: {
                        labels: etiquetas,
                        datasets: [
                            datosVentas2020,
                            // Aquí más datos...
                        ]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: false
                                }
                            }],
                        },
                    }
                });
            }
        </script>
    @endpush
</x-app-layout>


