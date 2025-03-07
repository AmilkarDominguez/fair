<?php

namespace App\Http\Livewire\ReadingReport;

use Livewire\Component;

class ReadingReportPrintC3 extends Component
{
                ////////////////////
        // DATOS NECESARIOS
        public $month_rate = 'Noviembre';
        public $customer_consumption = 232; // consumo del cliente

        // Datos de Tarifario CATEGORIA (C-3)
        public $minimum_charge = 24.288; //cargo FIJO
        // carga variable 1
        public $variable_one_rate = 1.627; public $variable_one = 0;
        // carga variable 2
        public $variable_two_rate = 1.593; public $variable_two = 40;
        // carga variable 3
        public $variable_three_rate = 0; public $variable_three = 0;
        // carga variable 4
        public $variable_four_rate = 0; public $variable_four = 0;
        // carga variable 5
        public $variable_five_rate = 0; public $variable_five = 0;
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
    public function calculo_C3()
    {


        //variable1
        if($this->customer_consumption <= $this->variable_two){
            $this->variable1 = round($this->customer_consumption * $this->variable_one_rate,2);
        } else {
            $this->variable1 = round($this->variable_two * $this->variable_one_rate,2);
        }
        $this->variable1 = round($this->variable1,2);

        //variable2
        if($this->customer_consumption <= $this->variable_two){
            $this->variable2 = 0;
        } else {
            $this->variable2 = round($this->variable2 = ($this->customer_consumption - $this->variable_two) * $this->variable_two_rate,2);
        }
        $this->variable2 = round($this->variable2,2);
        //////////////////////////////////////////////////////////////////////////////////////////////////////

        $this->fixed_charge = $this->minimum_charge; //cargo minimo/fijo
        $this->amount_for_energy = $this->fixed_charge + $this->variable1 + $this->variable2; //importe por energia


        $this->street_lighting = round($this->amount_for_energy*0.12*0.84,2); //Por alumbrado publico
        $this->urban_toilet = 29.40; //Por aseo urbano
        $this->tax_payment = $this->street_lighting + $this->urban_toilet;  //pago de tasas
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




        ////////////////////////////////////////////////////////
        /// VALORES A IMPRIMIR

        $this->fixed_minimum_charge_amount_print = round( $this->fixed_charge,2);  //importe por cargo minimo/fijo
        $this->amount_for_energy_print = $this->variable1 + $this->variable2 ; //importe por energia
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
    public function render()
    {
        //return view('livewire.reading-report.reading-report-print');
    }
}
