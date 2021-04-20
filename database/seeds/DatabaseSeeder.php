<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CuentapoteTableSeeder::class);
        $this->call(NaturalezaTableSeeder::class);
        $this->call(NacionalidadTableSeeder::class);
        $this->call(FormapagoTableSeeder::class);
        $this->call(TipoclienteTableSeeder::class);
        $this->call(ConceptoTableSeeder::class);
        $this->call(MovingresoegresoTableSeeder::class);
        $this->call(ClienteTableSeeder::class);
        $this->call(ProductoTableSeeder::class);
        $this->call(VentaTableSeeder::class);
    }
}
