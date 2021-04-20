<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //modulos
        Permission::create([
            'name'        => 'Modulo facturación',
            'slug'        => 'facturacion',
            'description' => 'Permitir acceso al modulo de facturación',
        ]);
        Permission::create([
            'name'        => 'Modulo organización',
            'slug'        => 'organizacion',
            'description' => 'Permitir acceso al modulo de organización',
        ]);
        Permission::create([
            'name'        => 'Modulo configuración',
            'slug'        => 'configuracion',
            'description' => 'Permitir acceso al modulo de configuración',
        ]);
        Permission::create([
            'name'        => 'Visualizar saldos',
            'slug'        => 'saldo.index',
            'description' => 'Visualizar saldos',
        ]);
        Permission::create([
            'name'        => 'Modulo seguridad',
            'slug'        => 'seguridad',
            'description' => 'Permitir acceso al modulo de seguridad',
        ]);

    	//cliente
        Permission::create([
            'name'        => 'Navegar clientes',
            'slug'        => 'cliente.index',
            'description' => 'Ve listado de todos los clientes',
        ]);
        Permission::create([
            'name'        => 'Creación de clientes',
            'slug'        => 'cliente.create',
            'description' => 'Creación de clientes',
        ]);
        Permission::create([
            'name'        => 'Edición de clientes',
            'slug'        => 'cliente.edit',
            'description' => 'Editar datos de clientes',
        ]);
        Permission::create([
            'name'        => 'Generar PDF de cliente',
            'slug'        => 'cliente.pdf',
            'description' => 'Generar PDF de cliente',
        ]);

        //Movimientos
        Permission::create([
            'name'        => 'Navegar movimientos',
            'slug'        => 'megresos.index',
            'description' => 'Ve el listado de los movimientos',
        ]);
        Permission::create([
            'name'        => 'Ver detalle de clientes',
            'slug'        => 'megresos.show',
            'description' => 'Ve el detalle del movimiento',
        ]);
        Permission::create([
            'name'        => 'Crear movimiento',
            'slug'        => 'megresos.create',
            'description' => 'Crear movimiento',
        ]);

        //venta
        Permission::create([
            'name'        => 'Ver listado de facturas',
            'slug'        => 'venta.index',
            'description' => 'Ver listado de facturas',
        ]);
        Permission::create([
            'name'        => 'Ver el detalle de facturas',
            'slug'        => 'venta.show',
            'description' => 'Ver el detalle de facturas',
        ]);
        Permission::create([
            'name'        => 'Creación de ventas',
            'slug'        => 'venta.create',
            'description' => 'Creación de ventas',
        ]);
        Permission::create([
            'name'        => 'Anular Factura',
            'slug'        => 'venta.destroy',
            'description' => 'Anular Factura',
        ]);
        Permission::create([
            'name'        => 'Generar PDF de venta',
            'slug'        => 'venta.pdf',
            'description' => 'Generar PDF de venta',
        ]);

        //servicio
        Permission::create([
            'name'        => 'Ver listado de servicio',
            'slug'        => 'producto.index',
            'description' => 'Ver listado de servicio',
        ]);
        Permission::create([
            'name'        => 'Creación de servicio',
            'slug'        => 'producto.create',
            'description' => 'Creación de servicio',
        ]);

        Permission::create([
            'name'        => 'Editar servicio',
            'slug'        => 'producto.edit',
            'description' => 'Editar servicio',
        ]);
        Permission::create([
            'name'        => 'Desactivar servicio',
            'slug'        => 'producto.destroy',
            'description' => 'Desactivar servicio',
        ]);
        Permission::create([
            'name'        => 'Generar PDF de servicio',
            'slug'        => 'producto.pdf',
            'description' => 'Generar PDF de servicio',
        ]);

        //cargo
        Permission::create([
            'name'        => 'Ver listado de cargo',
            'slug'        => 'cargo.index',
            'description' => 'Ver listado de cargo',
        ]);
        Permission::create([
            'name'        => 'Creación de cargo',
            'slug'        => 'cargo.create',
            'description' => 'Creación de cargo',
        ]);

        Permission::create([
            'name'        => 'Editar cargo',
            'slug'        => 'cargo.edit',
            'description' => 'Editar cargo',
        ]);
        Permission::create([
            'name'        => 'Desactivar cargo',
            'slug'        => 'cargo.destroy',
            'description' => 'Desactivar cargo',
        ]);
        Permission::create([
            'name'        => 'Generar PDF de cargo',
            'slug'        => 'cargo.pdf',
            'description' => 'Generar PDF de cargo',
        ]);

        //departamento
        Permission::create([
            'name'        => 'Ver listado de departamento',
            'slug'        => 'dpto.index',
            'description' => 'Ver listado de departamento',
        ]);
        Permission::create([
            'name'        => 'Creación de departamento',
            'slug'        => 'dpto.create',
            'description' => 'Creación de departamento',
        ]);

        Permission::create([
            'name'        => 'Editar departamento',
            'slug'        => 'dpto.edit',
            'description' => 'Editar departamento',
        ]);
        Permission::create([
            'name'        => 'Desactivar departamento',
            'slug'        => 'dpto.destroy',
            'description' => 'Desactivar departamento',
        ]);
        Permission::create([
            'name'        => 'Generar PDF de departamento',
            'slug'        => 'dpto.pdf',
            'description' => 'Generar PDF de departamento',
        ]);

        //concepto
        Permission::create([
            'name'        => 'Ver listado de concepto',
            'slug'        => 'conceptos.index',
            'description' => 'Ver listado de concepto',
        ]);
        Permission::create([
            'name'        => 'Creación de concepto',
            'slug'        => 'conceptos.create',
            'description' => 'Creación de concepto',
        ]);
        Permission::create([
            'name'        => 'Editar concepto',
            'slug'        => 'conceptos.edit',
            'description' => 'Editar concepto',
        ]);
        Permission::create([
            'name'        => 'Desactivar concepto',
            'slug'        => 'conceptos.destroy',
            'description' => 'Desactivar concepto',
        ]);
        Permission::create([
            'name'        => 'Generar PDF de concepto',
            'slug'        => 'conceptos.pdf',
            'description' => 'Generar PDF de concepto',
        ]);

        //Forma de pago
        Permission::create([
            'name'        => 'Ver listado de forma pago',
            'slug'        => 'fpago.index',
            'description' => 'Ver listado de forma pago',
        ]);
        Permission::create([
            'name'        => 'Creación de forma pago',
            'slug'        => 'fpago.create',
            'description' => 'Creación de forma pago',
        ]);
        Permission::create([
            'name'        => 'Editar forma pago',
            'slug'        => 'fpago.edit',
            'description' => 'Editar forma pago',
        ]);
        Permission::create([
            'name'        => 'Desactivar forma pago',
            'slug'        => 'fpago.destroy',
            'description' => 'Desactivar forma pago',
        ]);
        Permission::create([
            'name'        => 'Generar PDF de forma pago',
            'slug'        => 'fpago.pdf',
            'description' => 'Generar PDF de forma pago',
        ]);

        //Cuenta pote
        Permission::create([
            'name'        => 'Ver listado de cuentas',
            'slug'        => 'cpotes.index',
            'description' => 'Ver listado de cuentas',
        ]);

        //Nacionalidad
        Permission::create([
            'name'        => 'Ver listado de nacionalidades',
            'slug'        => 'nacionalidad.index',
            'description' => 'Ver listado de nacionalidades',
        ]);
        Permission::create([
            'name'        => 'Creación de nacionalidades',
            'slug'        => 'nacionalidad.create',
            'description' => 'Creación de nacionalidades',
        ]);
        Permission::create([
            'name'        => 'Editar nacionalidades',
            'slug'        => 'nacionalidad.edit',
            'description' => 'Editar nacionalidades',
        ]);
        Permission::create([
            'name'        => 'Desactivar nacionalidades',
            'slug'        => 'nacionalidad.destroy',
            'description' => 'Desactivar nacionalidades',
        ]);
        Permission::create([
            'name'        => 'Generar PDF de nacionalidades',
            'slug'        => 'nacionalidad.pdf',
            'description' => 'Generar PDF de nacionalidades',
        ]);

        //Tipo cliente
        Permission::create([
            'name'        => 'Ver listado de tipo cliente',
            'slug'        => 'tcliente.index',
            'description' => 'Ver listado de tipo cliente',
        ]);
        Permission::create([
            'name'        => 'Creación de tipo cliente',
            'slug'        => 'tcliente.create',
            'description' => 'Creación de tipo cliente',
        ]);
        Permission::create([
            'name'        => 'Editar tipo cliente',
            'slug'        => 'tcliente.edit',
            'description' => 'Editar tipo cliente',
        ]);
        Permission::create([
            'name'        => 'Desactivar tipo cliente',
            'slug'        => 'tcliente.destroy',
            'description' => 'Desactivar tipo cliente',
        ]);
        Permission::create([
            'name'        => 'Generar PDF de tipo cliente',
            'slug'        => 'tcliente.pdf',
            'description' => 'Generar PDF de tipo cliente',
        ]);

        //Empresa
        Permission::create([
            'name'        => 'Ver listado de empresa',
            'slug'        => 'empresa.index',
            'description' => 'Ver listado de empresa',
        ]);
        Permission::create([
            'name'        => 'Creación de empresa',
            'slug'        => 'empresa.create',
            'description' => 'Creación de empresa',
        ]);
        Permission::create([
            'name'        => 'Editar empresa',
            'slug'        => 'empresa.edit',
            'description' => 'Editar empresa',
        ]);

        //Usuario
        Permission::create([
            'name'        => 'Ver listado de usuarios',
            'slug'        => 'user.index',
            'description' => 'Ver listado de usuarios',
        ]);
        Permission::create([
            'name'        => 'Creación de usuarios',
            'slug'        => 'user.create',
            'description' => 'Creación de usuarios',
        ]);
        Permission::create([
            'name'        => 'Creación de usuarios',
            'slug'        => 'user.show',
            'description' => 'Creación de usuarios',
        ]);
        Permission::create([
            'name'        => 'Editar usuarios',
            'slug'        => 'user.edit',
            'description' => 'Editar usuarios',
        ]);
        Permission::create([
            'name'        => 'Desactivar usuarios',
            'slug'        => 'user.destroy',
            'description' => 'Desactivar usuarios',
        ]);
        Permission::create([
            'name'        => 'Generar PDF de usuarios',
            'slug'        => 'user.pdf',
            'description' => 'Generar PDF de usuarios',
        ]);

        //roles
        Permission::create([
            'name'        => 'Ver listado de roles',
            'slug'        => 'roles.index',
            'description' => 'Ver listado de roles',
        ]);
        Permission::create([
            'name'        => 'Creación de roles',
            'slug'        => 'roles.create',
            'description' => 'Creación de roles',
        ]);
        Permission::create([
            'name'        => 'Editar roles',
            'slug'        => 'roles.edit',
            'description' => 'Editar roles',
        ]);
    }
}
