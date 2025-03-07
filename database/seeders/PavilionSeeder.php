<?php

namespace Database\Seeders;

use App\Models\Pavilion;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PavilionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pavilion::create([
            'name' => 'Pabellón Tarija 1',
            'fair_id' => '3',
            'description' => 'Pabellón Tarija 1',
            'slug' => Str::uuid(),
            'state' => 'ACTIVO'
        ]);
        Pavilion::create([
            'name' => 'Pabellón Tarija 2',
            'fair_id' => '3',
            'description' => 'Descripción Pabellón Tarija 2',
            'slug' => Str::uuid(),
            'state' => 'ACTIVO'
        ]);
        Pavilion::create([
            'name' => 'Pabellón Tarija 3',
            'fair_id' => '3',
            'description' => 'Descripción Pabellón Tarija 3',
            'slug' => Str::uuid(),
            'state' => 'ACTIVO'
        ]);
        Pavilion::create([
            'name' => 'Pabellón Tarija 4',
            'fair_id' => '3',
            'description' => 'Descripción Pabellón Tarija 4',
            'slug' => Str::uuid(),
            'state' => 'ACTIVO'
        ]);
        Pavilion::create([
            'name' => 'Automotores',
            'fair_id' => '3',
            'description' => 'Descripción Automotores',
            'slug' => Str::uuid(),
            'state' => 'ACTIVO'
        ]);
    }
}
