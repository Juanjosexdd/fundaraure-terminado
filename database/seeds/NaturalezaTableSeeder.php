<?php

use Illuminate\Database\Seeder;
use App\Naturaleza;

class NaturalezaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Naturaleza::create([
            'nombre' => 'INGRESOS'
        ]);
        Naturaleza::create([
            'nombre' => 'EGRESOS'
        ]);

    }
}
