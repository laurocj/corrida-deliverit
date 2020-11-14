<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResultsStoreRequest;
use App\Result;
use Carbon\Carbon;

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
        if(!empty($request->finish)) {
            $startTime = Carbon::parse($request->start);
            $finishTime = Carbon::parse($request->finish);
            $request->duration = $finishTime->diff($startTime)->format('%H:%I:%S');
        } else {
            $request->duration = '00:00:00';
        }

        $post = Result::create(
            [
                'participant_id' => $request->participant,
                'racing_id' => $request->racing,
                'start' => $request->start,
                'finish' => $request->finish,
                'duration' => $request->duration
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
