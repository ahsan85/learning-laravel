<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'ccntent' => $faker->unique()->safeEmail,
        'user_id' => random_int(1,3),
    ];
});
