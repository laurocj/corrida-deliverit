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

            return [$participant, $racing];
    }

    /**
     * @return void
     * @depends test_can_create_race_participants
     */
    public function test_cannot_create_race_participants_for_the_same_participating_in_the_same_day(array $array)
    {
        $participant = $array[0];
        $racing = $array[1];
        $racingNew = factory(Racing::class)->create(['date' => $racing->date]);

        $data = [
            'participant' => $participant->id,
            'racing' => $racingNew->id
        ];

        $this->json('POST', route('race-participants.store'), $data)
            ->assertStatus(422)
            ->assertJsonValidationErrors(['participant' => 'A participant can only register for races on different days']);
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
            'start' => '08:00:00',
            'finish' => \Carbon\Carbon::parse('08:00:00')->addMinutes(mt_rand(60, 120))->format('H:i:s')
        ];

        $this->json('POST', route('race-participants.store'), $data)
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
            'start' => '08:00:00',
            'finish' => \Carbon\Carbon::parse('08:00:00')->addMinutes(mt_rand(60, 120))->format('H:i:s')
        ];

        $this->json('POST', route('race-participants.store'), $data)
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
            'start' => '08:00:00',
            'finish' => \Carbon\Carbon::parse('08:00:00')->addMinutes(mt_rand(60, 120))->format('H:i:s')
        ];

        $this->json('POST', route('race-participants.store'), $data)
            ->assertStatus(422)
            ->assertJsonValidationErrors(['racing']);
    }
}
