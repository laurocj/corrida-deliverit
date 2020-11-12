<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParticipantsStoreRequest;
use App\Participant;

class ParticipantsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request|App\Http\Requests\ParticipantsStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParticipantsStoreRequest $request)
    {
        $participant = Participant::create($request->all());
        return response()->json($participant, 201);
    }
}
