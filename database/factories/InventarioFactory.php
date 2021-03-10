<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Inventario;
use Faker\Generator as Faker;

$factory->define(Inventario::class, function (Faker $faker) {
    return [
        "producto_id" => $faker->numberBetween(1,10),
        "proveedor_id" => $faker->numberBetween(1,10),
        "cantidad" => $faker->numberBetween(10,100)
    ];
});
