<?php

use Components\Model\User;

$factory->define(User::class, function (Faker\Generator $faker) {

    $email_exists = true;

    do {

        $email = $faker->email;

        $user = User::query()
            ->where('email = :email:')
            ->bind([
                'email' => $email,
            ])
            ->execute();

        if ( $user->getFirst() === false ) {
            $email_exists = false;
        }

    } while($email_exists);

    return [
        'email'          => $email,
        'name'           => $faker->name,
        'token'          => str_random(100),
        'is_activated'   => (int) true,
        'password'       => password_hash(str_random(10), PASSWORD_BCRYPT),
    ];

});
