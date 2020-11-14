<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResultsStoreRequest;
use App\Result;

class ResultsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request|App\Http\Requests\ResultsStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResultsStoreRequest $request)
    {
        $post = Result::create(
            [
                'participant_id' => $request->participant,
                'racing_id' => $request->racing,
                'start' => $request->start,
                'finish' => $request->finish
            ]
        );

        return response()->json([
            'participant' => $post->participant_id,
            'racing' => $post->racing_id,
            'start' => $post->start,
            'finish' => $post->finish
        ], 201);
    }
}
