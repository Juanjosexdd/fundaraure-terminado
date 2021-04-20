<?php

use Illuminate\Database\Seeder;
use App\Venta;
use App\DetalleVenta;

class VentaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Venta::create([
            'idcliente'    => '1',
            'idusuario'    => '1',
            'codformapago' => '1',
            'num_venta'    => '37895',
            'fecha_venta'  => '2020-05-19',
            'impuesto'     => '0',
            'total'        => '0',
            'estado'       => 'Procesado',
            'created_at'   => '2020-05-19'
        ]);

        DetalleVenta::create([
            'idproducto'   => '1',
            'idventa'      => '1',
            'cantidad'     => '1',
            'precio'       => '0',
            'descuento'    => '0'
        ]);

    }
}
