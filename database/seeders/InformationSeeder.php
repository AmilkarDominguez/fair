<?php

namespace Database\Seeders;

use App\Models\Information;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class InformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Information::create([
        'title' => 'FEXPOTARIJA',
        'mission' => 'Somos una institución empresarial sin fines de lucro, comprometida con el desarrollo integral de nuestros asociados, que promueve la competitividad y el desarrollo socioeconómico de Tarija a través de la prestación de servicios de calidad.',
        'view' => 'Ser la institución empresarial líder en el Departamento de Tarija y referente a nivel nacional.',
        'adress' => 'Calle Bolívar Nº 233 Piso 1 - Casilla Nº 74',
        'phone' => '(591-4) 6642737',
        'whatsapp' => '6635670',
        'email' => 'www.caincotar.org',
        'facebook' => 'https://www.facebook.com/fexpotarijaoficial',
        'instagram' => 'https://www.instagram.com/fexpotarija/',
        'description' => '',
        'slug' => Str::uuid(),
        'state' => 'ACTIVO']);
    }
}
