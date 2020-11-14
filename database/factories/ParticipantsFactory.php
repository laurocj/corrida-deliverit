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
        'birth' => \Carbon\Carbon::now()->subYears(mt_rand(18, 60))->format('Y-m-d')
    ];
});
