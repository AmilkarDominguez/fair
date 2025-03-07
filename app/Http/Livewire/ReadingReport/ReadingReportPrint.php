<?php

namespace App\Http\Livewire\ReadingReport;

use App\Models\ReadingReport;
use Livewire\Component;

class ReadingReportPrint extends Component
{
    public $ReadingReport;
    public $slug;
    ////////////////////
        // DATOS NECESARIOS
        public $month_rate = 'Noviembre';
        public $customer_consumption = 232; // consumo del cliente

        // Datos de Tarifario CATEGORIA RESIDENCIAL(DOM)
        public $minimum_charge = 20.587; //carga minima
        // carga variable 1
        public $variable_one_rate = 0.547; public $variable_one = 20;
        // carga variable 2
        public $variable_two_rate = 0.956; public $variable_two = 100;
        // carga variable 3
        public $variable_three_rate = 1.004; public $variable_three = 200;
        // carga variable 4
        public $variable_four_rate = 1.004; public $variable_four = 500;
        // carga variable 5
        public $variable_five_rate = 1.004; public $variable_five = 1000;
        ////////////////////////////////////////////////////////////
        //variables para la resultante
        public  $fixed_charge = 0;//cargominimo/fijo
        public  $variable1 = 0;
        public  $variable2 = 0;
        public  $variable3 = 0;
        public  $variable4 = 0;
        public  $variable5 = 0;
        public  $amount_for_energy = 0; //importe por energia


        public  $law1886 = 0; //ley 1886
        public  $dignity_rate = 0; // tasa dignidad

        public  $street_lighting = 0; //alumbrado publico
        public  $urban_toilet = 0; //aseo urbano
        public  $tax_payment = 0; //pago de tasas
        ///////////////////////////////////////////////////////////////


        public  $energy_charge = 0; //cargo por energia
        public  $amount_of_the_month = 0; // importe del mes a cancelar

        ////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////
        /// VALORES A IMPRIMIR
        public $fixed_minimum_charge_amount_print = 0; //importe por cargo minimo/fijo
        public $amount_for_energy_print = 0; //importe por energia
        public $total_amount_for_energy_print = 0; //importe total por energia
        public $total_amount_for_consumption_print = 0; //importe total por consumo
        public $total_amount_for_consumption_tax_credit_print = 0; //importe total por consumo credito fiscal
        //////////////////////////////////////////////////////////////
        //////////TASAS PARA EL GOBIERNO MUNICIPAL/////////////////
        public $for_public_lighting_print = 0; //por alumbrado publico
        public $by_urban_toilet_print = 0; // por aseo urbano

        public $payment_of_fees_print = 0; // pago de tasas
        public $amount_of_the_month_to_cancel_print = 0; //importe total a cancelar



     // Calculo
    public function calculo_DOM()
    {


        //variable1
        if($this->customer_consumption < $this->variable_one){
            $this->variable1 = 0;
        } else {
            if($this->customer_consumption < $this->variable_two){
               $this->variable1 = round($this->variable1 = ($this->customer_consumption - $this->variable_one) * $this->variable_one_rate,2);
            } else {
                $this->variable1 = round($this->variable1 = ($this->variable_two - $this->variable_one) * $this->variable_one_rate,2);
            }
        }
        $this->variable1 = round($this->variable1,2);

        //variable2
        if($this->customer_consumption < $this->variable_two){
            $this->variable2 = 0;
        } else {
            if($this->customer_consumption < $this->variable_three){
               $this->variable2 = round($this->variable2 = ($this->customer_consumption - $this->variable_two) * $this->variable_two_rate,2);
            } else {
                $this->variable2 = round($this->variable2 = ($this->variable_three - $this->variable_two) * $this->variable_two_rate,2);
            }
        }
        $this->variable2 = round($this->variable2,2);


        //variable3
        if($this->customer_consumption < $this->variable_three){
            $this->variable3 = 0;
        } else {
            if($this->customer_consumption < $this->variable_four){
               $this->variable3 = round($this->variable3 = ($this->customer_consumption - $this->variable_three) * $this->variable_three_rate,2);
            } else {
                $this->variable3 = round($this->variable3 = ($this->variable_four - $this->variable_three) * $this->variable_three_rate,2);
            }
        }
        $this->variable3 = round($this->variable3,2);


        //variable4
        if($this->customer_consumption < $this->variable_four){
            $this->variable4 = 0;
        } else {
            if($this->customer_consumption < $this->variable_five){
               $this->variable4 = round($this->variable4 = ($this->customer_consumption - $this->variable_four) * $this->variable_four_rate,2);
            } else {
                $this->variable4 = round($this->variable4 = ($this->variable_five - $this->variable_four) * $this->variable_four_rate,2);
            }
        }
        $this->variable4 = round($this->variable4,2);


        //variable5
        if($this->customer_consumption < $this->variable_five){
            $this->variable5 = 0;
        } else {
            $this->variable5 = round($this->variable5 = ($this->customer_consumption - $this->variable_five) * $this->variable_five_rate,2);
        }
        $this->variable5 = round($this->variable5,2);
        //////////////////////////////////////////////////////////////////////////////////////////////////////

        $this->fixed_charge = $this->minimum_charge; //cargo minimo/fijo
        $this->amount_for_energy = $this->fixed_charge + $this->variable1 + $this->variable2 + $this->variable3 + $this->variable4 + $this->variable5; //importe por energia


        $this->street_lighting = round($this->amount_for_energy*0.12*0.84,2); //Por alumbrado publico
        $this->urban_toilet = 29.40; //Por aseo urbano
        $this->tax_payment = $this->street_lighting + $this->urban_toilet;  //pago de tasas
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




        ////////////////////////////////////////////////////////
        /// VALORES A IMPRIMIR

        $this->fixed_minimum_charge_amount_print = round( $this->fixed_charge,2);  //importe por cargo minimo/fijo
        $this->amount_for_energy_print = $this->variable1 + $this->variable2 + $this->variable3 + $this->variable4 + $this->variable5; //importe por energia
        $this->total_amount_for_energy_print = round( $this->fixed_minimum_charge_amount_print + $this->amount_for_energy_print,2);  //importe total por energia

        $this->total_amount_for_consumption_print = $this->total_amount_for_energy_print; //importe total por consumo
        $this->total_amount_for_consumption_tax_credit_print = $this->total_amount_for_energy_print; //importe total por consumo credito fiscal
        //////////////////////////////////////////////////////////////
        //////////TASAS PARA EL GOBIERNO MUNICIPAL/////////////////

        $this->for_public_lighting_print = $this->street_lighting; //por alumbrado publico
        $this->by_urban_toilet_print = $this->urban_toilet; // por aseo urbano
        $this->payment_of_fees_print = $this->tax_payment; // pago de tasas


        $this->amount_of_the_month_to_cancel_print = round($this->fixed_minimum_charge_amount_print + $this->amount_for_energy_print + $this->for_public_lighting_print + $this->by_urban_toilet_print, 2); //importe total a cancelar



    }






    //Datos
    public $broadcast_date='TARIJA 10 DE JUNIO DE 202000'; //fecha emisión
    public $customer = 'Carlos Mollinedi Gonzales'; //Cliente
    public $ci = '67990087'; //CI
    public $client_number = '67-87-766'; //Número de Cliente
    public $meter_number = '46887778'; // Número de Cliente
    public $city= 'Tarija'; //Ciudad
    public $exercise = '-'; //Actividad
    public $consignment_route = '1/123'; //Remesa-Ruta
    public $reading_type = 'Lectura Normal'; //Tipo de Lectura
    public $month_reading = 'JUNIO - 2021'; // Mes de Factura
    public $category = 'DOM'; //Categoria
    public $previous_date = '11-JUL-21'; //Fecha Anterior
    public $current_date = '10-AGO-21'; //Fecha Actual
    public $previous_reading = '1500'; //Lecuctura Anterior
    public $current_reading = '1700'; //Lecutura Actual
    public $days = '700 DÍAS'; //Dias
    public $amount_per_charge = 20.29;//Importe por cargo
    public $amount_for_energy_p = 0.03; //Importe por energía
    public $total_amount_for_energy = 20.32; //Importe total por energía
    public $dignity_rate_p = -5.07; //Tarifa Dignidad
    public $total_amount_for_consumption = 15.25; //Importe total por consumo
    public $total_amount_for_the_supply = 15.25; //Importe total por el suministro
    public $street_lighting_p = 2.05; //Alumbrado publico
    public $urban_toilet_p = 8.70; //Aseo urbano
    public $tax_payment_p = 10.75; //Pago de tasas
    public $amount_total = 26.00; //Importe total
    public $base_amount = 15.25; //Importe base
    public function mount($slug)
    {
        //$this->ReadingReport = ReadingReport::where('slug', $slug)->firstOrFail();
        // if ($this->ReadingReport) {

        // }
    }

    public function render()
    {
        return view('livewire.reading-report.reading-report-print');
    }
}
