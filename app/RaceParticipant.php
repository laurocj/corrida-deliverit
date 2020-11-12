<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RaceParticipant extends Model
{
    protected $fillable = [
        'participant_id',
        'racing_id'
    ];
}
