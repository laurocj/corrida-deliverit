<?php

namespace Tests\Unit;

use App\Participant;
use App\Racing;
use Tests\TestCase;

class RaceParticipantsTest extends TestCase
{
    /**
     * @return void
     */
    public function test_can_create_race_participants()
    {
        $racing = factory(Racing::class)->create();
        $participant = factory(Participant::class)->create();

        $data = [
            'participant' => $participant->id,
            'racing' => $racing->id
        ];

        $this->json('POST', route('race-participants.store'), $data)
            ->assertStatus(201)
            ->assertJson($data);
    }

    /**
     * @return void
     */
    public function test_cannot_create_race_participants_for_participant_that_does_not_exist()
    {
        $racing = factory(Racing::class)->create();

        $data = [
            'participant' => 1000,
            'racing' => $racing->id
        ];

        $this->json('POST', route('race-participants.store'), $data)
            ->assertStatus(422)
            ->assertJsonValidationErrors(['participant']);
    }

    /**
     * @return void
     */
    public function test_cannot_create_race_participants_for_racing_that_does_not_exist()
    {
        $participant = factory(Participant::class)->create();

        $data = [
            'participant' => $participant->id,
            'racing' => 1000
        ];

        $this->json('POST', route('race-participants.store'), $data)
            ->assertStatus(422)
            ->assertJsonValidationErrors(['racing']);
    }
}
