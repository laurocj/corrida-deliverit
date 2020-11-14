<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RaceParticipant extends Model
{
    protected $fillable = [
        'participant_id',
        'racing_id',
        'start',
        'finish',
        'duration'
    ];

    public function ranking()
    {
        return $this->select('race_participants.racing_id', 'race_participants.duration', 'racings.distance', 'race_participants.participant_id', 'participants.birth', 'participants.name')
                ->join('participants','participants.id', '=', 'race_participants.participant_id')
                ->join('racings','racings.id', '=', 'race_participants.racing_id')
                ->orderBy('racings.distance')
                ->orderBy('race_participants.duration')
                ->get();
    }
}
