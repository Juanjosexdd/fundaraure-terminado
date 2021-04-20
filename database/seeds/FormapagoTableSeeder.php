<?php

use Illuminate\Database\Seeder;
use App\Formapago;

class FormapagoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Formapago::create([
            'nombre' => 'DEBITO',
            'descripcion' => 'DEBITO'
        ]);
        Formapago::create([
            'nombre' => 'CREDITO',
            'descripcion' => 'CREDITO'
        ]);
    }
}
