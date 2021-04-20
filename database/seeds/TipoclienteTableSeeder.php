<?php

use Illuminate\Database\Seeder;
use App\Tipocliente;

class TipoclienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipocliente::create([
            'nombre' => 'PERSONAL',
            'descripcion' => 'PERSONAL'
        ]);
        Tipocliente::create([
            'nombre' => 'JURIDICO',
            'descripcion' => 'JURIDICO'
        ]);
    }
}
