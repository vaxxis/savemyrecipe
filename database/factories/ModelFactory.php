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
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];

});

$factory->define(App\IngredientType::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->word,
    ];

});

$factory->define(App\Ingredient::class, function (Faker\Generator $faker) {

    $ingredient_type_id = App\IngredientType::lists('id')->random();
    return [
        'name' => $faker->word,
        'ingredient_type_id' => $ingredient_type_id,
    ];

});


$factory->define(App\Recipe::class, function (Faker\Generator $faker) {

    $user_id = App\User::lists('id')->random();
    $date = $faker->dateTimeThisMonth;

    $photoProviderUrl = null;
    // $photoProviderUrl = "http://lorempixel.com/300/300/food/" . rand(0,10);
    // $photoProviderUrl = $faker->boolean(50) ? $photoProviderUrl : null; // 50% chance

    return [
        'name'          => rtrim($faker->sentence(3), "."),
        'photo'         => $photoProviderUrl,
        'description'   => implode('<br><br>', $faker->paragraphs(3)),
        'level'         => array_rand(App\Recipe::levels()),
        'course'        => array_rand(App\Recipe::courses()),
        'is_private'    => $faker->boolean(10), // change of TRUE 10%
        'user_id'       => $user_id,
        'created_at'    => $date,
        'updated_at'    => $date,
    ];

});
