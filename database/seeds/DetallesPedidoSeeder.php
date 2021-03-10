<?php

use Illuminate\Database\Seeder;

class DetallesPedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\DetallesPedido::class,10)->create();
    }
}
