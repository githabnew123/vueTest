<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TestingTest extends TestCase
{
    /**
     * Test the resetGame method.
     *
     * @return void
     */
    public function testResetGame()
    {
        $response = $this->getJson('/api/tic-tac-toe/reset');

        $response->assertStatus(200);
        $response->assertJson([
            'winner' => 'Me',
        ]);
    }

    /**
     * Test the makeMove method.
     *
     * @return void
     */
    public function testMakeMove()
    {
        $payload = [
            'index' => 0,
        ];

        $response = $this->postJson('/api/tic-tac-toe/move', $payload);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'board',
            'currentPlayer',
            'winner',
        ]);

        $response->assertJson([
            'board' => [
                0 => null,
            ],
            'currentPlayer' => null,
            'winner' => null,
        ]);
    }
}
