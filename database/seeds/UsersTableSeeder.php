<?php

use App\Cargo;
use App\Departamento;
use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;
use App\User;
use App\Role_user;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


    	// Add the master administrator, user id of 1
        User::create([
            'nombre' => 'ADMINISTRADOR',
            'apellido' => 'ADMINISTRADOR',
            'usuario' => 'administrador',
            'email' => 'admin@admin.com',
            'password' => 'secret'
        ]);
        Cargo::create([
            'nombre' => 'ADMINISTRADOR',
            'descripcion' => 'ADMINISTRADOR',
            'estatus' => '1'
        ]);
        Departamento::create([
            'nombre' => 'INFORMATICA',
            'descripcion' => 'INFORMATICA',
            'estatus' => '1'
        ]);

        



        // factory(App\User::class, 9)->create();

        Role::create([
        	'name' 		=> 'Admin',
        	'slug' 		=> 'Admin',
        	'special' 	=> 'all-access'
        ]);

        Role_user::create([
        	'role_id' 		=> '1',
        	'user_id' 		=> '1'
        ]);
    }
}
