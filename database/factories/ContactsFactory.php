<?php

use Faker\Generator as Faker;

$factory->define(App\Contact::class, function (Faker $faker) {
    return [
        'contact_name' =>$faker->name,
        'contact_web'=>$faker->freeEmailDomain,
        'contact_email'=>$faker->safeEmail,
        'contact_message'=>$faker->text
    ];
});
