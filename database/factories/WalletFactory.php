<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Wallet;
use Faker\Generator as Faker;

$factory->define(Wallet::class, function (Faker $faker) {
    return [
        'bank_name' => 'Access Bank',
        'account_number' => '00897655632',
        'account_name' => $faker->name,
    ];
});
