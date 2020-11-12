<?php

namespace Tests\Unit;

use App\Racing;
use Tests\TestCase;

class RancingsTest extends TestCase
{
    /**
     * @return void
     */
    public function test_can_create_racing()
    {
        $data = [
            'distance' => array_rand(Racing::DISTANCES, 1),
            'date' => date('Y-m-d', strtotime('+' . mt_rand(0, 30) . ' days'))
        ];

        $this->json('POST', route('racings.store'), $data)
            ->assertStatus(201)
            ->assertJson($data);
    }

    /**
     * @return void
     */
    public function test_cannot_create_race_with_past_date()
    {
        $data = [
            'distance' => array_rand(Racing::DISTANCES, 1),
            'date' => date('Y-m-d', strtotime('-' . mt_rand(0, 30) . ' days'))
        ];

        $this->json('POST', route('racings.store'), $data)
            ->assertStatus(422)
            ->assertJsonValidationErrors(['date']);
    }

    /**
     * @return void
     */
    public function test_cannot_create_race_with_distance_not_registered()
    {
        $data = [
            'distance' => 18,
            'date' => date('Y-m-d', strtotime('+' . mt_rand(0, 30) . ' days'))
        ];

        $this->json('POST', route('racings.store'), $data)
            ->assertStatus(422)
            ->assertJsonValidationErrors(['distance']);
    }
}
