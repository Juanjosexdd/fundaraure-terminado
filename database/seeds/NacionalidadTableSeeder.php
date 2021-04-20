<?php

use Illuminate\Database\Seeder;
use App\Nacionalidad;

class NacionalidadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Nacionalidad::create([
            'nombre' => 'VENEZOLANO',
            'abreviado' => 'V'
        ]);
        Nacionalidad::create([
            'nombre' => 'EXTRANJERO',
            'abreviado' => 'E'
        ]);
    }
}
