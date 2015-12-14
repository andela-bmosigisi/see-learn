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

$factory->define(Learn\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'email' => $faker->email,
        'password' => bcrypt('password'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Learn\Video::class, function (Faker\Generator $faker) {
    $randomVideoIds =
        ['AWLLOTKrNok', 'EAK_MqX_ox4', 'ABRP_5RYhqU', 'dRfW7tuG6ZQ'];
    $length = count($randomVideoIds);
    $category = factory('Learn\Category')->create()->id;

    return [
        'title' => $faker->word,
        'description' => $faker->sentence,
        'youtube_id' => $randomVideoIds[rand(1, $length - 1)],
        'user_id' => $category->user->id,
        'category_id' => $category,
    ];
});

$factory->define(Learn\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
        'user_id' => factory('Learn\User')->create()->id,
    ];
});
