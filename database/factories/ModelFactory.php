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
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Page::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'text' => $faker->paragraph(3),
        'title' => $faker->sentence(2),
        'keywords' => implode(', ', $faker->words(4)),
        'description' => $faker->sentence(),
    ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {
    $name = $faker->word;
    $slug = str_slug($name);

    return [
        'name' => $name,
        'slug' => $slug,
        'price' => $faker->randomFloat(2, 99, 100000),
        'material' => $faker->numberBetween(1, 7),
        'brief' => $faker->sentence(),
        'text' => $faker->paragraph(3),
        'available' => $faker->boolean(),
        'title' => $faker->sentence(2),
        'keywords' => implode(', ', $faker->words(4)),
        'description' => $faker->sentence(),
        'category_id' => $faker->randomElement([4,5,6,7,9,10,11,12,13,14,15]),
        'image' => $faker->image(storage_path('images').DIRECTORY_SEPARATOR.'products', 640, 480, null, false, false),
    ];
});
