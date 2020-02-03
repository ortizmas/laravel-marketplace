<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Store;
use Faker\Generator as Faker;

$factory->define(Store::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'slug' => $faker->slug,
        'description' => $faker->sentence,
        'phone' => $faker->phoneNumber,
        'mobil_phone' => $faker->phoneNumber,
    ];
});
