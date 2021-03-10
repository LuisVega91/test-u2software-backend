<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pedido;
use Faker\Generator as Faker;

$factory->define(Pedido::class, function (Faker $faker) {
    return [
        'referencia' => $faker->numberBetween(657657,234354),
        'entrego' => $faker->boolean,
        'total' => $faker->numberBetween(4500,90000)
    ];
});
