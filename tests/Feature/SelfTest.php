<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class SelfTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
         User::factory()->count(3)->create();
         $response = $this->getJson('/selftest');
         $response->assertStatus(200);
         $response->assertJsonCount(3);
    }
}
