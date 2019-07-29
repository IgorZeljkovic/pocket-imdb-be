<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'text' => $faker->text(490),
        'author_id' => $faker->randomElement([1, 2, 3, 12]),
        'commentable_type' => App\Movie::class,
        'commentable_id' => $faker->randomElement([1, 2, 3, 4])
    ];
});
