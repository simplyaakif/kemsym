<?php

use Faker\Generator as Faker;

$factory->define(App\Products::class, function (Faker $faker) {
    return [
        'product_name'=>$faker->name,
        'product_name'=>$faker->name,
    ];
});
