<?php

namespace App\Http\Controllers;

use App\Http\Requests\RacingsStoreRequest;
use App\Racing;

class RacingsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request|App\Http\Requests\RacingsStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RacingsStoreRequest $request)
    {
        $racing = Racing::create($request->all());
        return response()->json($racing, 201);
    }
}
