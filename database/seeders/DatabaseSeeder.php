<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleTableSeeder::class);
        $this->call(InformationSeeder::class);
        $this->call(FairSeeder::class);

        $this->call(PavilionSeeder::class);
        $this->call(StandSeeder::class);
        $this->call(ProductCategorySeeder::class);
        $this->call(TypeCompaniesSeeder::class);
        $this->call(BusinessWheelSeeder::class);
    }
}
