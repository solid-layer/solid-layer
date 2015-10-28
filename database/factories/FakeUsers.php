<?php

$factory->define(Components\Model\User::class, function (Faker\Generator $faker) {
    return [
        'email'          => $faker->email,
        'name'           => $faker->name,
        'token'          => str_random(100),
        'is_activated'   => (int) true,
        'password'       => password_hash(str_random(10), PASSWORD_BCRYPT),
    ];
});
