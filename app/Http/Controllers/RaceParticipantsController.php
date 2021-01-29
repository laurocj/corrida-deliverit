<?php

namespace App\Http\Controllers;

use App\Http\Requests\RaceParticipantsStoreRequest;
use App\RaceParticipant;
use App\Racing;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class RaceParticipantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $results = (new RaceParticipant)->ranking();

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
     * @param  \Illuminate\Http\Request|App\Http\Requests\RaceParticipantsStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RaceParticipantsStoreRequest $request)
    {
        if (!empty($request->finish)) {
            $startTime = Carbon::parse($request->start);
            $finishTime = Carbon::parse($request->finish);
            $duration = $finishTime->diff($startTime)->format('%H:%I:%S');
        } else {
            $duration = '00:00:00';
            $startTime = NULL;
            $finishTime = NULL;
        }

        $raceParticipant = RaceParticipant::create(
            [
                'participant_id' => $request->participant,
                'racing_id' => $request->racing,
                'start' => $startTime,
                'finish' => $finishTime,
                'duration' => $duration
            ]
        );

        $data = [
            'participant' => $raceParticipant->participant_id,
            'racing' => $raceParticipant->racing_id
        ];

        if(!empty($raceParticipant->start)) {
            $data['start'] = $raceParticipant->start->format('H:i:s');
            $data['finish'] = $raceParticipant->finish->format('H:i:s');
        }

        return response()->json($data, 201);
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

                    $key = 'racing_' . $distance;

                    $array[$key][] = [
                        'racing'        => $result->racing_id,
                        'distance'      => $distance . ' Km',
                        'paticipant'    => $result->participant_id,
                        'age'           => $result->age,
                        'name'          => $result->name,
                        'position'      => isset($array[$key]) ? count($array[$key]) + 1 : 1
                    ];
                    break;
                }
            }
            return $result;
        });

        return $ranges;
    }
}
