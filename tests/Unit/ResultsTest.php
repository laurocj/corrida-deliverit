<?php

namespace Tests\Unit;

use App\Participant;
use App\Racing;
use Tests\TestCase;

class ResultsTest extends TestCase
{
    /**
     * @return void
     */
    public function test_can_create_results()
    {
        $racing = factory(Racing::class)->create();
        $participant = factory(Participant::class)->create();

        $data = [
            'participant' => $participant->id,
            'racing' => $racing->id,
            'start' => date('H:i:s', strtotime('+' . mt_rand(0, 2) . ' hours')),
            'finish' => date('H:i:s', strtotime('+' . mt_rand(2, 4) . ' hours'))
        ];

        $this->json('POST', route('results.store'), $data)
            ->assertStatus(201)
            ->assertJson($data);
    }

    /**
     * @return void
     */
    public function test_cannot_create_results_for_participant_that_does_not_exist()
    {
        $racing = factory(Racing::class)->create();

        $data = [
            'participant' => 1000,
            'racing' => $racing->id,
            'start' => date('H:i:s', strtotime('+' . mt_rand(0, 2) . ' hours')),
            'finish' => date('H:i:s', strtotime('+' . mt_rand(2, 4) . ' hours'))
        ];

        $this->json('POST', route('results.store'), $data)
            ->assertStatus(422)
            ->assertJsonValidationErrors(['participant']);
    }

    /**
     * @return void
     */
    public function test_cannot_create_results_for_racing_that_does_not_exist()
    {
        $participant = factory(Participant::class)->create();

        $data = [
            'participant' => $participant->id,
            'racing' => 1000,
            'start' => date('H:i:s', strtotime('+' . mt_rand(0, 2) . ' hours')),
            'finish' => date('H:i:s', strtotime('+' . mt_rand(2, 4) . ' hours'))
        ];

        $this->json('POST', route('results.store'), $data)
            ->assertStatus(422)
            ->assertJsonValidationErrors(['racing']);
    }
}
