<div>
    <x-slot name="header">
        <div class="font-semibold text-xl text-gray-800 leading-tight">
            Boleta de lectura
        </div>
    </x-slot>

    <div class="container m-auto mt-5 rounded-md">
        <div class="pt-10 px-10">
            <h1 class=" text-2xl font-bold">Datos boleta</h1>
        </div>

        <div class="m-10 mt-0 p-4">

                {{-- broadcast_date --}}
                Fecha emicion
                <x-jet-input type="text" placeholder="broadcast_date" wire:model="broadcast_date" class="mt-1 block w-full rounded-full"/>
                {{-- end broadcast_date --}}

                <x-jet-button type="button" wire:click="calculo_DOM" class="btn btn-danger">Click Me</x-jet-button>

                <p>Importe por cargo minimo/fijo = {{ $fixed_minimum_charge_amount_print }}</p>
                <p>Importe por energia = {{ $amount_for_energy_print  }}</p>
                <p>Importe total por energia = {{ $total_amount_for_energy_print }}</p>
                <br>
                <p>Importe total por consumo = {{ $total_amount_for_consumption_print }}</p>
                <p>Importe total por el suministro(cre. fiscal)= {{ $total_amount_for_consumption_tax_credit_print }} </p>
                <br>
                <p>Beneficio por tasa dignidad= </p>
                <p>Importe total por consumo = </p>
                <br>
                <h1>TASAS PARA EL GOBIERNO MUNICIPAL</h1>
                <p>por alumbrado publico = {{ $for_public_lighting_print }}</p>
                <p>por aseo urbano = {{ $by_urban_toilet_print }}</p>
                <p>PAGO DE TASAS = {{ $payment_of_fees_print }}</p>
                <h1>IMPORTE DEL MES A CANCELAR = {{ $amount_of_the_month_to_cancel_print }}</h1>

                {{-- customer --}}
                Cliente
                <x-jet-input type="text" placeholder="customer" wire:model="customer" class="mt-1 block w-full rounded-full"/>
                {{-- end customer --}}

                {{-- ci --}}
                Ci
                <x-jet-input type="text" placeholder="ci" wire:model="ci" class="mt-1 block w-full rounded-full"/>
                {{-- end ci --}}

                {{-- client_number --}}
                Nro. Cliente
                <x-jet-input type="text" placeholder="client_number" wire:model="client_number" class="mt-1 block w-full rounded-full"/>
                {{-- end client_number --}}

                {{-- meter_number --}}
                Nro. Medidor
                <x-jet-input type="text" placeholder="meter_number" wire:model="meter_number" class="mt-1 block w-full rounded-full"/>
                {{-- end meter_number --}}

                {{-- city --}}
                Ciudad
                <x-jet-input type="text" placeholder="city" wire:model="city" class="mt-1 block w-full rounded-full"/>
                {{-- end city --}}

                {{-- exercise --}}
                Actividad
                <x-jet-input type="text" placeholder="exercise" wire:model="exercise" class="mt-1 block w-full rounded-full"/>
                {{-- end exercise --}}

                {{-- reading_type --}}
                Tipo de Lectura
                <x-jet-input type="text" placeholder="reading_type" wire:model="reading_type" class="mt-1 block w-full rounded-full"/>
                {{-- end reading_type --}}

                {{-- month_reading --}}
                Mes de Lectura
                <x-jet-input type="text" placeholder="month_reading" wire:model="month_reading" class="mt-1 block w-full rounded-full"/>
                {{-- end month_reading --}}

                {{-- category --}}
                Categorías
                <x-jet-input type="text" placeholder="category" wire:model="category" class="mt-1 block w-full rounded-full"/>
                {{-- end category --}}

                {{-- previous_date --}}
                Fecha Anterior
                <x-jet-input type="text" placeholder="previous_date" wire:model="previous_date" class="mt-1 block w-full rounded-full"/>
                {{-- end previous_date --}}

                {{-- current_date --}}
                Fecha Actual
                <x-jet-input type="text" placeholder="current_date" wire:model="current_date" class="mt-1 block w-full rounded-full"/>
                {{-- end current_date --}}

                {{-- previous_reading --}}
                Lectura Anterior
                <x-jet-input type="text" placeholder="previous_reading" wire:model="previous_reading" class="mt-1 block w-full rounded-full"/>
                {{-- end previous_date --}}

                {{-- current_reading --}}
                Lectura Actual
                <x-jet-input type="text" placeholder="current_reading" wire:model="current_reading" class="mt-1 block w-full rounded-full"/>
                {{-- end previous_date --}}

                {{-- days --}}
                Importe por cargo
                <x-jet-input type="text" placeholder="days" wire:model="days" class="mt-1 block w-full rounded-full"/>
                {{-- end days --}}

                {{-- amount_per_charge --}}
                Importe por energía
                 <x-jet-input type="number" placeholder="amount_per_charge" wire:model="amount_per_charge" class="mt-1 block w-full rounded-full"/>
                {{-- end amount_per_charge --}}

                {{-- total_amount_for_energy --}}
                Importe total por energía
                 <x-jet-input type="number" placeholder="total_p" wire:model="total_amount_for_energy_p" class="mt-1 block w-full rounded-full"/>
                {{-- end total_amount_for_energy --}}

                {{-- dignity_rate --}}
                Tarifa dignidad
                <x-jet-input type="number" placeholder="dignity_rate_p" wire:model="dignity_rate_p" class="mt-1 block w-full rounded-full"/>
                {{-- end dignity_rate --}}

                {{-- total_amount_for_consumption --}}
                Importe total por consumo
                <x-jet-input type="number" placeholder="total_amount_for_consumption" wire:model="total_amount_for_consumption" class="mt-1 block w-full rounded-full"/>
                {{-- end total_amount_for_consumption --}}

                {{-- total_amount_for_the_supply --}}
                Importe total por el suministro
                <x-jet-input type="number" placeholder="total_amount_for_the_supply" wire:model="total_amount_for_the_supply" class="mt-1 block w-full rounded-full"/>
                {{-- end total_amount_for_the_supply --}}

                {{-- street_lighting --}}
                Allumbrado publico
                <x-jet-input type="number" placeholder="street_lighting_p" wire:model="street_lighting_p" class="mt-1 block w-full rounded-full"/>
                {{-- end street_lighting --}}

                {{-- urban_toilet --}}
                Aseo urbano
                <x-jet-input type="number" placeholder="urban_toilet_p" wire:model="urban_toilet_p" class="mt-1 block w-full rounded-full"/>
                {{-- end urban_toilet --}}

                {{-- tax_payment --}}
                Pago de tasas
                <x-jet-input type="number" placeholder="tax_payment_p" wire:model="tax_payment_p" class="mt-1 block w-full rounded-full"/>
                {{-- end tax_payment --}}

                {{-- urban_toilet --}}
                Importe total
                <x-jet-input type="number" placeholder="amount_total" wire:model="amount_total" class="mt-1 block w-full rounded-full"/>
                {{-- end urban_toilet --}}

                {{-- base_amount --}}
                Importe base
                <x-jet-input type="number" placeholder="base_amount" wire:model="base_amount" class="mt-1 block w-full rounded-full"/>
                {{-- end base_amount --}}


        </div>
    </div>



    {{-- boleta lecutacion --}}
    <div class="container m-auto mt-5 rounded-md w-96 p-1">
        <div id="printableArea">
            <div class=" w-full bg-red-500 text-white text-center py-4 rounded-md">
                DATOS DE CONSUMIDOR
            </div>
            <div class="mt-1">
                <div class="w-full bg-white  border-red-500 border-2 py-4 rounded-md px-4 font-normal">


                    <div class="grid grid-cols-3  gap-2 borderx text-sm">

                        <div class="col-span-3  borderx">
                            <div class="text-gray-500">
                                FECHA DE EMISIÓN
                            </div>
                            {{$broadcast_date}}
                        </div>

                        <div class="col-span-3  borderx">
                            <div class="text-gray-500">
                                NOMBRE
                            </div>
                            {{$customer}}
                        </div>

                        <div class="col-span-1 borderx">
                            <div class="text-gray-500">
                                NIT/CI
                            </div>
                            {{$ci}}
                        </div>
                        <div class="col-span-1 borderx">
                            <div class="text-gray-500">
                                NRO. CLIENTE
                            </div>
                            {{$client_number}}
                        </div>
                        <div class="col-span-1 borderx">
                            <div class="text-gray-500">
                                NRO. MEDIDOR
                            </div>
                            {{$meter_number}}
                        </div>

                        <div class="col-span-2 borderx">
                            <div class="text-gray-500">
                                CIUDAD/LOCALIDAD
                            </div>
                            {{$city}}
                        </div>
                        <div class="col-span-1 borderx">
                            <div class="text-gray-500">
                                ACTIVIDAD
                            </div>
                            {{$exercise}}
                        </div>

                        <div class="col-span-2 borderx">
                            <div class="text-gray-500">
                                REMESA/RUTA
                            </div>
                            {{$consignment_route}}
                        </div>
                        <div class="col-span-1 borderx">
                            <div class="text-gray-500">
                                TIPO LECTURA
                            </div>
                            {{$reading_type}}
                        </div>

                        <div class="col-span-2 borderx">
                            <div class="text-gray-500">
                                MES DE FACTURA
                            </div>
                            {{$month_reading}}
                        </div>
                        <div class="col-span-1 borderx">
                            <div class="text-gray-500">
                                CATEGORÍA
                            </div>
                            {{$category}}
                        </div>




                        <div class="col-span-2 borderx">
                            <div class="text-gray-500">
                                FECHA LECTURA
                            </div>
                            <div class="text-gray-500">
                                ANTERIOR
                            </div>
                            {{$previous_date}}
                        </div>
                        <div class="col-span-1 borderx">
                            <div class="text-gray-500">
                                &nbsp;
                            </div>
                            <div class="text-gray-500">
                                ACTUAL
                            </div>
                            {{$current_date}}
                        </div>



                        <div class="col-span-2 borderx">
                            <div class="text-gray-500">
                                LECTURA MEDIDOR
                            </div>
                            <div class="text-gray-500">
                                ANTERIOR
                            </div>
                            {{$previous_reading}}
                        </div>
                        <div class="col-span-1 borderx">
                            <div class="text-gray-500">
                                &nbsp;
                            </div>
                            <div class="text-gray-500">
                                ACTUAL
                            </div>
                            {{$current_reading}}
                        </div>


                        <div class="col-span-2 borderx">
                            <div class="text-gray-500">
                                ENERGÍA CONSUMIDA EN
                            </div>
                            {{$days}}
                        </div>
                        <div class="col-span-1 borderx">
                            <div class="text-gray-500">
                                &nbsp;
                            </div>
                            0 KWh
                        </div>


                        <div class="col-span-2 borderx">
                            <div class="text-gray-500">
                                TOTAL ENERGÍA A FACTURAR
                            </div>
                        </div>
                        <div class="col-span-1 borderx">
                            0 KWh
                        </div>

                    </div>
                </div>

            </div>

            <div class="mt-1 w-full bg-red-500 text-white text-center py-4 rounded-md">
                DETALLE DE LA FACTURACIÓN
            </div>
            <div class="mt-1">
                <div class="w-full bg-white  border-red-500 border-2 py-4 rounded-md px-4 font-normal">


                    <div class="grid grid-cols-4  gap-2 borderx text-sm">

                        <div class="col-span-2  borderx">
                            Importe por cargo
                            mínimo/fijo:
                        </div>
                        <div class="col-span-1 text-right borderx">
                            Bs.
                        </div>
                        <div class="col-span-1 text-right borderx">
                            {{$amount_per_charge}}
                        </div>

                        <div class="col-span-2  borderx">
                            Importe por energía:
                        </div>
                        <div class="col-span-1 text-right borderx">
                            Bs.
                        </div>
                        <div class="col-span-1 text-right borderx">
                            {{$amount_for_energy_p}}
                        </div>

                        <div class="col-span-2  borderx">
                            Importe total por energía:
                        </div>
                        <div class="col-span-1 text-right borderx">
                            Bs.
                        </div>
                        <div class="col-span-1 text-right borderx">
                            {{$total_amount_for_energy}}
                        </div>

                        <div class="col-span-2  borderx">
                            Beneficiado por
                            "Tarifa Dignidad" con:
                        </div>
                        <div class="col-span-1 text-right borderx">
                            Bs.
                        </div>
                        <div class="col-span-1 text-right borderx">
                            {{$dignity_rate_p}}
                        </div>

                        <div class="col-span-2  borderx">
                            Importe total por consumo:
                        </div>
                        <div class="col-span-1 text-right borderx">
                            Bs.
                        </div>
                        <div class="col-span-1 text-right borderx">
                            {{$total_amount_for_consumption}}
                        </div>

                        <div class="col-span-2  borderx">
                            Importe total por el
                            suministro (Cre. Fiscal):
                        </div>
                        <div class="col-span-1 text-right borderx">
                            Bs.
                        </div>
                        <div class="col-span-1 text-right borderx">
                            {{$total_amount_for_the_supply}}
                        </div>

                        <div class="col-span-4  borderx p-0 text-xs font-bold -mb-2">
                            TASAS PARA EL GOBIERNO MUNICIPAL
                        </div>

                        <div class="col-span-2  borderx">
                            Por alumbrado público:
                        </div>
                        <div class="col-span-1 text-right borderx">
                            Bs.
                        </div>
                        <div class="col-span-1 text-right borderx">
                            {{$street_lighting_p}}
                        </div>

                        <div class="col-span-2  borderx">
                            Por aseo urbano:
                        </div>
                        <div class="col-span-1 text-right borderx">
                            Bs.
                        </div>
                        <div class="col-span-1 text-right borderx">
                            {{$urban_toilet_p}}
                        </div>

                        <div class="col-span-2  borderx">
                            Pago de tasas:
                        </div>
                        <div class="col-span-1 text-right borderx">
                            Bs.
                        </div>
                        <div class="col-span-1 text-right borderx">
                            {{$tax_payment_p}}
                        </div>

                        <div class="col-span-4  borderx">
                            Son: VEINTISEIS. Bolivianos
                        </div>

                        <div class="col-span-4  borderx">
                            <div class=" h-0.5 w-full bg-gray-900">
                            </div>
                        </div>
                        <div class="col-span-2  borderx font-bold">
                            Importe total:
                        </div>
                        <div class="col-span-1 text-right borderx font-bold">
                            Bs.
                        </div>
                        <div class="col-span-1 text-right borderx font-bold">
                            {{$amount_total}}
                        </div>
                        <div class="col-span-4  borderx">
                            <div class=" h-0.5 w-full bg-gray-900">
                            </div>
                        </div>

                        <div class="col-span-4  borderx p-0 text-xs font-bold text-center -mb-2">
                            DEUDA PENDIENTE
                        </div>


                        <div class="col-span-2  borderx">
                            Importe base (Cre. Fiscal):
                        </div>
                        <div class="col-span-1 text-right borderx">
                            Bs.
                        </div>
                        <div class="col-span-1 text-right borderx">
                            {{$base_amount}}
                        </div>

                    </div>
                </div>

            </div>
        </div>


    </div>
    {{-- end boleta lecutacion --}}

    <div wire:ignore class="container m-auto bg-white rounded-md w-96 p-1 mt-5 mb-10">
        <x-jet-button onclick="printDiv('printableArea')"
            class=" h-12 w-full rounded-full flex items-center justify-center">
            <i class="fas fa-print"></i>&nbsp; Imprimir
        </x-jet-button>
        <script>
            function printDiv(divName) {
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;

                window.print();

                document.body.innerHTML = originalContents;
            }
        </script>
    </div>
</div>
