<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(2),
        'description' => $faker->sentence(20),
        'stock' => $faker->numberBetween(1,100),
        'price' => $faker->numberBetween(100,5000),
        'weight' => $faker->numberBetween(100,500),
        'cover_img' => $faker->randomElement(['storage/products/faker/product-1.jpg' ,'storage/products/faker/product-2.jpg', 'storage/products/faker/product-3.jpg','storage/products/faker/product-4.jpg']),
        'shop_id' => $faker->randomElement([1,2]),

    ];
});
