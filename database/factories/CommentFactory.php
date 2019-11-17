<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {

    $maxUserId = User::max('id');

    return [
        'comment' => $faker->paragraph,
        'user_id' => rand(2,$maxUserId)
    ];
});
