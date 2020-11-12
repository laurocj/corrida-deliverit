<?php

namespace App\Http\Controllers;

use App\Http\Requests\RaceParticipantsStoreRequest;
use App\RaceParticipant;

class RaceParticipantsController extends Controller
{
   /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request|App\Http\Requests\RaceParticipantsStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RaceParticipantsStoreRequest $request)
    {
        $post = RaceParticipant::create(
            [
                'participant_id' => $request->participant,
                'racing_id' => $request->racing

            ]
        );

        return response()->json([
            'participant' => $post->participant_id,
            'racing' => $post->racing_id
        ], 201);
    }
}
