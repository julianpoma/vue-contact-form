<?php

use Faker\Generator as Faker;

$factory->define(App\DataPlan::class, function (Faker $faker) {
    return [
        'name' => 'Internet '.$faker->numberBetween(2,100).'mbps',
        'price' => $faker->randomFloat(2, 500, 2000),
        'setup_price' => $faker->randomFloat(2, 500, 2000),
    ];
});
