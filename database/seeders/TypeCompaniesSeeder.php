<?php

namespace Database\Seeders;

use App\Models\Information;
use App\Models\TypeCompany;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class TypeCompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeCompany::create([
            'name' => 'Empresas Internacionales',
            'amount' => '200',
            'slug' => Str::uuid(),
            'state' => 'ACTIVO']);
        TypeCompany::create([
            'name' => 'Empresas Nacionales',
            'amount' => '150',
            'slug' => Str::uuid(),
            'state' => 'ACTIVO']);
        TypeCompany::create([
            'name' => 'Empresas Locales',
            'amount' => '100',
            'slug' => Str::uuid(),
            'state' => 'ACTIVO']);
        TypeCompany::create([
            'name' => 'Socios CAINCOTAR',
            'amount' => '70',
            'slug' => Str::uuid(),
            'state' => 'ACTIVO']);
        TypeCompany::create([
            'name' => 'Empresas expositoras en la feria',
            'amount' => '0',
            'slug' => Str::uuid(),
            'state' => 'ACTIVO']);
    }
}
