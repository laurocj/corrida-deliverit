<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
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
        return $this->select('results.racing_id', 'results.duration', 'racings.distance', 'results.participant_id', 'participants.birth', 'participants.name')
                ->join('participants','participants.id', '=', 'results.participant_id')
                ->join('racings','racings.id', '=', 'results.racing_id')
                ->orderBy('racings.distance')
                ->orderBy('results.duration')
                ->get();
    }
}
