<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResultsStoreRequest;
use App\Racing;
use App\Result;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $results = (new Result)->ranking();

        if ($request->age) {
            $results = $this->classificationByAge($results);
        } else {
            $results = $this->classificationAll($results);
        }

        return $results;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request|App\Http\Requests\ResultsStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResultsStoreRequest $request)
    {
        if (!empty($request->finish)) {
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

    /**
     * Returns the overall rating
     *
     * @param  \Illuminate\Support\Collection
     * @return array
     */
    private function classificationAll(Collection $results)
    {
        return $this->classification($results, ['all' => []]);
    }

    /**
     * Returns the classification by age
     *
     * @param  \Illuminate\Support\Collection
     * @return array
     */
    private function classificationByAge(Collection $results)
    {

        $ranges = $this->classification(
            $results,
            [
                '24' => [],
                '34' => [],
                '44' => [],
                '54' => [],
                '+55' => []
            ]
        );

        foreach ([
            '24' => '18-25',
            '34' => '25-35',
            '44' => '35-45',
            '54' => '45-54',
            '+55' => '55+'
        ] as $key => $range) {

            $ranges[$range] = $ranges[$key];
            unset($ranges[$key]);
        }

        return $ranges;
    }

    /**
     * Returns the sort
     *
     * @param  \Illuminate\Support\Collection
     * @param  array
     * @return array
     */
    private function classification(Collection $results, array $ranges)
    {
        $results->map(function ($result) use (&$ranges) {

            $result->age = Carbon::parse($result->birth)->age;

            foreach ($ranges as $breakpoint => &$array) {
                if (is_string($breakpoint) || $breakpoint >= $result->age) {
                    $distance = Racing::DISTANCES[$result->distance];

                    $array['racing_' . $distance][] = [
                        'racing'        => $result->racing_id,
                        'distance'      => $distance . ' Km',
                        'paticipant'    => $result->participant_id,
                        'age'           => $result->age,
                        'name'          => $result->name,
                        'position'      => isset($array[$distance]) ? count($array[$distance]) + 1 : 1
                    ];
                    break;
                }
            }
            return $result;
        });

        return $ranges;
    }
}
