<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {

    return [
        'category_id' => rand(1,10),
        'name' => $faker->word(7),
        'description' => $faker->text,
        'url' => 'https://laravel.com',
        'pdt_image' => 'https://i.picsum.photos/id/'.rand(50,200).'/200/300.jpg',
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => NULL,
        'user_id' => rand(1,4),
    ];
});
