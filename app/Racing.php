<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Racing extends Model
{

    const DISTANCE_3    = 1;
    const DISTANCE_5    = 2;
    const DISTANCE_10   = 3;
    const DISTANCE_21   = 4;
    const DISTANCE_42   = 5;
    const DISTANCES     = [
        self::DISTANCE_3    => '3',
        self::DISTANCE_5    => '5',
        self::DISTANCE_10   => '10',
        self::DISTANCE_21   => '21',
        self::DISTANCE_42   => '42',
    ];

    protected $fillable = [
        'distance',
        'date'
    ];
}
