<?php

namespace Database\Seeders;

use App\Models\Fair;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class FairSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fair::create([
            'name' => 'Fexpo Tarija 2020',
            'slug' => Str::uuid(),
            'state' => 'ACTIVO'
        ]);
        Fair::create([
            'name' => 'Fexpo Tarija 2020',
            'slug' => Str::uuid(),
            'state' => 'ACTIVO'
        ]);
        Fair::create([
            'name' => 'Fexpo Tarija 2020',
            'slug' => Str::uuid(),
            'state' => 'ACTIVO'
        ]);
        Fair::create([
            'name' => 'Fexpo Tarija 2020',
            'slug' => Str::uuid(),
            'state' => 'ACTIVO'
        ]);
    }
}
