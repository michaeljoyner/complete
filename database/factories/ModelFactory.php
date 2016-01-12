<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => str_random(10),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Blog\PostCategory::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph(),
    ];
});

$factory->define(App\Blog\Post::class, function (Faker\Generator $faker) {
    return [
        'user_id' => factory(\App\User::class)->create()->id,
        'post_category_id' => factory(\App\Blog\PostCategory::class)->create()->id,
        'title' => $faker->sentence(),
        'description' => $faker->paragraph(),
        'body' => $faker->paragraphs(5, true),
    ];
});

$factory->define(App\Blog\Tag::class, function (Faker\Generator $faker) {
    return [
        'tag' => $faker->word,
    ];
});

$factory->define(App\Importing\ImportResult::class, function (Faker\Generator $faker) {
    return [
        'article_id' => $faker->numberBetween(1, 100),
        'imported' => $faker->randomElement([0,1])
    ];
});




