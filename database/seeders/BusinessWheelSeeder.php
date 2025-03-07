<?php

namespace Database\Seeders;

use App\Models\Information;
use App\Models\BusinessWheel;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class BusinessWheelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BusinessWheel::create([
            'link' => 'https://docs.google.com/spreadsheets/d/1iTphtdPcGFe5fi1Kcvdp-pf4R_ODqOxym5_cbzRR7PY/edit#gid=2028481443',
            'description' => '1 Inscripciones: Registre su empresa descargando y llenando sus datos en DESCARGAR FORMULARIO, o en físico (hacer llegar por correo electrónico o en físico en las oficinas de CAINCOTAR). 
            2 Fecha límite de inscripción: 01 de abril de 2020. 3 Directorio de Empresas y Catálogo de Productos: Serán publicados y/o enviados por correo desde el 03 de abril de 2020.
            4 Agendar Reuniones: del 03 al 06 abril (hasta hrs. 18:30).
            5 Entrega de Agenda de Reuniones: el 07 de abril lugar CAINCOTAR, o el 08 de abril desde horas 08:30 en el lugar del evento. También serán enviados por correo. 
            6 Entrega de Credenciales y Materiales: el 07 de abril lugar CAINCOTAR, o el 08 de abril desde horas 08:30 en el lugar del evento. 
            7 Rueda de Negocios: 08 de abril, lugar Universidad Católica San Pablo, calle Colón entre Bolívar e Ingavi, N°734.']);
    }
}
