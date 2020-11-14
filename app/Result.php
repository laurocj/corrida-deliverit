<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'participant_id',
        'racing_id',
        'start',
        'finish'
    ];
}
