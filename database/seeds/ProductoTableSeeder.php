<?php

use Illuminate\Database\Seeder;
use App\Producto;

class ProductoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Producto::create([
    		'nombre' => 'PRODUCTO INICIAL',
	    	'precio_venta' => '0',
	    	'condicion' => '1'

    	]);

    }
}
