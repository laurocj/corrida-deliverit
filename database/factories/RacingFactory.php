<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Racing;
use Faker\Generator as Faker;

$factory->define(Racing::class, function (Faker $faker) {
    return [
        'distance' => array_rand(Racing::DISTANCES, 1),
        'date' => date('Y-m-d', strtotime('+' . mt_rand(0, 30) . ' days'))
    ];
});
