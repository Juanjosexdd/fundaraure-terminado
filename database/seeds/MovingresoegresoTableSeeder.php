<?php

use Illuminate\Database\Seeder;
use App\Movingresoegreso;

class MovingresoegresoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Movingresoegreso::create([
            'codconcepto' => '1',
            'codctapote' => '1',
            'monto' => '0',
            'observacion' => 'SALDO INICIAL'
        ]);

        Movingresoegreso::create([
            'codconcepto' => '2',
            'codctapote' => '2',
            'monto' => '0',
            'observacion' => 'SALDO INICIAL'
        ]);
    }
}
