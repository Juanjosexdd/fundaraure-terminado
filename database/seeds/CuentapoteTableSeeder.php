<?php

use Illuminate\Database\Seeder;
use App\Cuentapote;

class CuentapoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cuentapote::create([
            'nombre' => 'INGRESOS',
            'codcuenta' => '5000'
        ]);
        Cuentapote::create([
            'nombre' => 'EGRESOS',
            'codcuenta' => '6000'
        ]);
    }
}
