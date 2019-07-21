<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Category;
use Illuminate\Support\Str;
use Faker\Generator as Faker;


$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(\App\Category::class, function (Faker $faker) {
    return [
        'category_name' => $faker->name
    ];
});

$factory->define(\App\Post::class, function (Faker $faker) {
    return [
        'category_id' => rand(1, 10),
        'user_id' => rand(1, 10),
        'comment_id' => rand(1,10),
        'post_title' => $faker->sentence,
        'post_description' => $faker->paragraph,
        'post_image' => $faker->imageUrl,
    ];
});