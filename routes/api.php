<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/participants', 'ParticipantsController@store')->name('participants.store');
Route::post('/racings', 'RacingsController@store')->name('racings.store');
Route::post('/race-participants', 'RaceParticipantsController@store')->name('race-participants.store');
Route::get('/results', 'RaceParticipantsController@index')->name('race-participants.index');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
