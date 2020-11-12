<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Participant;
use Faker\Factory;
use Faker\Generator as Faker;

$factory->define(Participant::class, function (Faker $faker) {
    $faker = Factory::create('pt_BR');
    return [
        'name' => $faker->name,
        'cpf' => $faker->cpf,
        'birth' => date("Y-m-d", strtotime("-18 years"))
    ];
});
