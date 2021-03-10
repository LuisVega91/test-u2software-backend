<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Producto;
use Faker\Generator as Faker;

$factory->define(Producto::class, function (Faker $faker) {
    return [
       "nombre" => $faker->name,
        "valor" => $faker->numberBetween(1000,9999)
    ];
});
