<?php

namespace Tests\Unit;

use App\Participant;
use Tests\TestCase;

class ParticipantsTest extends TestCase
{
    /**
     * @return void
     */
    public function test_can_create_participant()
    {
        $data = [
            'name' => $this->faker->name,
            'cpf' => $this->faker->cpf,
            'birth' => \Carbon\Carbon::now()->subYears(18)->format('Y-m-d')
        ];

        $this->json('POST', route('participants.store'), $data)
            ->assertStatus(201)
            ->assertJson($data);
    }

    /**
     * @return void
     */
    public function test_cannot_create_underage_participants()
    {
        $data = [
            'name' => $this->faker->name,
            'cpf' => $this->faker->cpf,
            'birth' => \Carbon\Carbon::now()->subYears(17)->format('Y-m-d')
        ];

        $this->json('POST', route('participants.store'), $data)
            ->assertStatus(422)
            ->assertJsonValidationErrors(['birth' => 'Participant must be of legal age']);
    }
}
