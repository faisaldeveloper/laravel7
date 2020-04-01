<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {

    return [
        'category_id' => $faker->word,
        'name' => $faker->word,
        'description' => $faker->text,
        'url' => $faker->word,
        'pdt_image' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'user_id' => $faker->word
    ];
});
