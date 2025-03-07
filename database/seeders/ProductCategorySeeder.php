<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Categorias Pil Tarija
        ProductCategory::create([
            'name' => 'Mantequillas',
            'description' => '',
            'slug' => Str::uuid(),
            'state' => 'ACTIVO',
            'stand_id' => 1]);
        ProductCategory::create([
            'name' => 'Helados',
            'description' => '',
            'slug' => Str::uuid(),
            'state' => 'ACTIVO',
            'stand_id' => 1]);
        ProductCategory::create([
            'name' => 'Lacteos',
            'description' => '',
            'slug' => Str::uuid(),
            'state' => 'ACTIVO',
            'stand_id' => 1]);
        //Categorias Instituto Técnico Domingo Savio
        ProductCategory::create([
            'name' => 'Técnico superior',
            'description' => '',
            'slug' => Str::uuid(),
            'state' => 'ACTIVO',
            'stand_id' => 2]);
        ProductCategory::create([
            'name' => 'Técnico medio',
            'description' => '',
            'slug' => Str::uuid(),
            'state' => 'ACTIVO',
            'stand_id' => 2]);
        ProductCategory::create([
            'name' => 'Capacitación',
            'description' => '',
            'slug' => Str::uuid(),
            'state' => 'ACTIVO',
            'stand_id' => 2]);
        //Categorias Universidad Privada Domingo Savio
        ProductCategory::create([
            'name' => 'Ciencias Jurídicas',
            'description' => '',
            'slug' => Str::uuid(),
            'state' => 'ACTIVO',
            'stand_id' => 3]);
        ProductCategory::create([
            'name' => 'Ciencias Empresariales',
            'description' => '',
            'slug' => Str::uuid(),
            'state' => 'ACTIVO',
            'stand_id' => 3]);
        ProductCategory::create([
            'name' => 'Ciencias Sociales',
            'description' => '',
            'slug' => Str::uuid(),
            'state' => 'ACTIVO',
            'stand_id' => 3]);
        ProductCategory::create([
            'name' => 'Ingeniería',
            'description' => '',
            'slug' => Str::uuid(),
            'state' => 'ACTIVO',
            'stand_id' => 3]);
        //Categorias Imcruz
        ProductCategory::create([
            'name' => 'City Car',
            'description' => '',
            'slug' => Str::uuid(),
            'state' => 'ACTIVO',
            'stand_id' => 4]);
        ProductCategory::create([
            'name' => 'Sedán',
            'description' => '',
            'slug' => Str::uuid(),
            'state' => 'ACTIVO',
            'stand_id' => 4]);
        ProductCategory::create([
            'name' => 'Deportivo',
            'description' => '',
            'slug' => Str::uuid(),
            'state' => 'ACTIVO',
            'stand_id' => 4]);
        ProductCategory::create([
            'name' => 'Camioneta',
            'description' => '',
            'slug' => Str::uuid(),
            'state' => 'ACTIVO',
            'stand_id' => 4]);
        ProductCategory::create([
            'name' => 'Suv',
            'description' => '',
            'slug' => Str::uuid(),
            'state' => 'ACTIVO',
            'stand_id' => 4]);
    }
}
