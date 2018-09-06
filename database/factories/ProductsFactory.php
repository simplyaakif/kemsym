<?php

use Faker\Generator as Faker;

$factory->define(App\Products::class, function (Faker $faker) {
    return [
        'product_name'=>$faker->name,
        'product_subheading'=>$faker->text,
        'product_description'=>$faker->text,
        'img_path'=>'img/ico01.png',
        'price'=>80,
    ];
});
