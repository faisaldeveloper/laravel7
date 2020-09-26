<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Photo;
use Faker\Generator as Faker;

$factory->define(Photo::class, function (Faker $faker) {
    return [
        //https://source.unsplash.com/random
        'photo_name' => $faker->word,
        'photo_description' => $faker->text,
        'photo_path' => 'https://source.unsplash.com/random',
        'album_id' => function () {
            return factory(App\Models\Album::class)->create()->id;
        },
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
