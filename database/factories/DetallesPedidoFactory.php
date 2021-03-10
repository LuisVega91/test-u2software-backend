<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\DetallesPedido;
use Faker\Generator as Faker;

$factory->define(DetallesPedido::class, function (Faker $faker) {
    return [
        "producto_id" => $faker->numberBetween(1,10),
        "pedido_id" => $faker->numberBetween(1,10),
        "cantidad" => $faker->numberBetween(10,100)
    ];
});
