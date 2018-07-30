<?php

use Faker\Generator as Faker;

$factory->define(App\ServiceRequest::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'address_detail' => $faker->buildingNumber,
        'dni' => $faker->ean13,
        'phone' => $faker->phoneNumber,
        'email' => $faker->safeEmail,
        'data_plan' => $faker->domainWord,
        'check' => $faker->numberBetween(0,1),
    ];
});
