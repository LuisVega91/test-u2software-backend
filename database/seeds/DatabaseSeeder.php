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
        $this->call([ProveedorSeeder::class, ProductoSeeder::class, InventarioSeeder::class,PedidoSeeder::class,DetallesPedidoSeeder::class]);
    }
}
