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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Country::class, function (Faker\Generator $faker) {
    static $code;
    static $name;

    return [
        'code' => strtolower($faker->countryCode),
        'name' => $faker->country,
    ];
});

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;
    static $is_admin;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: bcrypt('secret'),
        'is_admin' => $is_admin,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Url::class, function (Faker\Generator $faker) {
    static $user_id;
    static $url;

    return [
        'user_id' => $user_id ?: App\User::inRandomOrder()->first()->id,
        'url' => $faker->url,
    ];
});

$factory->define(App\UserAgent::class, function (Faker\Generator $faker) {
    static $name;

    return [
        'name' => $name ?: $faker->userAgent,
    ];
});

$factory->define(App\UrlAccessLog::class, function (Faker\Generator $faker) {
    static $user_email;
    static $url;
    static $user_agent_id;
    static $country_code;
    static $ip;

    $url = $url ?: App\Url::inRandomOrder()->first();

    return [
        'user_email' => $user_email ?: App\User::inRandomOrder()->first()->email,
        'url_id' => $url->id,
        'url' => $url->url,
        'url_short' => $url->url_short,
        'user_agent_id' => $user_agent_id ?: App\UserAgent::inRandomOrder()->first()->id,
        'country_code' => $country_code ?: App\Country::inRandomOrder()->first()->code,
        'ip' => $ip ?: $faker->ipv4,
    ];
});
