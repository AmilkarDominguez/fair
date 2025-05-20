<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Person;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ROLES
        //ADMINISTRADOR
        $rol_admin = new Role();
        $rol_admin->name = 'admin';
        $rol_admin->description = 'Administrator';
        $rol_admin->slug = Str::uuid();
        $rol_admin->save();

        //VISITANTE
        $rol_visitante = new Role();
        $rol_visitante->name = 'visitante';
        $rol_visitante->description = 'Visitante';
        $rol_visitante->slug = Str::uuid();
        $rol_visitante->save();

        //FERIANTE
        $rol_feriante = new Role();
        $rol_feriante->name = 'feriante';
        $rol_feriante->description = 'Feriante';
        $rol_feriante->slug = Str::uuid();
        $rol_feriante->save();
        

        //CREDENCIALES PARA Administrador
        $persona = Person::create([
            'name' => 'Administrador',
        ]);

        $Admin = User::create([
            'person_id' => $persona->id,
            'email' => 'admin@admin.com',
            'state' => 'ACTIVO',
            'email_verified_at' => now(),
            'slug' => Str::uuid(),
            'password' => bcrypt('admin'),
            'remember_token' => Str::random(10),
        ]);
        $Admin->roles()->attach($rol_admin);


        //CREDENCIALES PARA VISITANTE
        $persona = Person::create([
            'name' => 'Visitante',
        ]);

        $visitante = User::create([
            'person_id' => $persona->id,
            'email' => 'visitante@email.com',
            'state' => 'ACTIVO',
            'email_verified_at' => now(),
            'slug' => Str::uuid(),
            'password' => bcrypt('123456'),
            'remember_token' => Str::random(10),
        ]);
        $visitante->roles()->attach($rol_visitante);

        //CREDENCIALES PARA Feriante
        $persona = Person::create([
            'name' => 'Feriante',
        ]);

        $Admin = User::create([
            'person_id' => $persona->id,
            'email' => 'feriante@email.com',
            'state' => 'ACTIVO',
            'email_verified_at' => now(),
            'slug' => Str::uuid(),
            'password' => bcrypt('123456'),
            'remember_token' => Str::random(10),
        ]);
        $Admin->roles()->attach($rol_feriante);

    }
}
