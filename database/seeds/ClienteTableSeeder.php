<?php

use Illuminate\Database\Seeder;
use App\Cliente;

class ClienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::create([
            'codtipocliente' => '1',
            'nombres' => 'CLIENTE INICIAL',
            'apellidos' => 'CLIENTE INICIAL',
            'codnacionalidad' => '1',
            'cedula' => '0000000',
            'direccion' => 'VENEZUELA',
            'telefono' => '0400-0000000',
            'email' => 'CLIENTEINICIAL@MAIL.COM'
        ]);
    }
}
