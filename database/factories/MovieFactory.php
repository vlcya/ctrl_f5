<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Movie;
use Faker\Generator as Faker;

$factory->define(Movie::class, function (Faker $faker) {
    return [
        'status' => rand(0, 1),
        'name' => $faker->text('15'),
        'rating' => rand(1, 10),
        'description' => $faker->text('50'),
        'image' => 'img/movies/dummy.png'
    ];
});
