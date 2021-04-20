<?php

use Illuminate\Database\Seeder;
use App\Concepto;

class ConceptoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Concepto::create([
            'codnaturaleza' => '1',
            'nombre' => 'INGRESO POR DONACION',
            'descripcion' => 'INGRESO POR DONACION',
            'estatus' => '1'
        ]);
        Concepto::create([
            'codnaturaleza' => '2',
            'nombre' => 'EGRESO POR GASTOS ADMINISTRATIVOS',
            'descripcion' => 'EGRESO POR GASTOS ADMINISTRATIVOS',
            'estatus' => '1'
        ]);
        Concepto::create([
            'codnaturaleza' => '1',
            'nombre' => 'INGRESO POR FACTURA REGISTRADA',
            'descripcion' => 'CORRESPONDE AL REGISTRO DE FACTURAS',
            'estatus' => '1'
        ]);

    }
}
