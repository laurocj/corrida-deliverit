<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Participant;
use App\RaceParticipant;
use App\Racing;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(RaceParticipant::class, function (Faker $faker) {

    $startTime = Carbon::parse('08:00:00');
    $finishTime = Carbon::parse('08:00:00')->addMinutes(mt_rand(60, 120));
    $duration = $finishTime->diff($startTime)->format('%H:%I:%S');
    return [
        'participant_id' => factory(Participant::class)->create(),
        'racing_id' => factory(Racing::class)->create(),
        'start' => $startTime->format('H:i:s'),
        'finish' => $finishTime->format('H:i:s'),
        'duration' => $duration
    ];
});
