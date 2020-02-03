<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'slug' => $faker->slug,
        'description' => $faker->sentence,
        'body' => $faker->paragraph(5, true),
        'price' => $faker->randomFloat(2, 1, 10),
    ];
});
