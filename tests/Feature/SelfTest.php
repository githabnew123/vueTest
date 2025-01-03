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

    public function testStoreCreatesNewUser()
    {
        // Arrange: Prepare the request payload
        $payload = [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => 'securepassword',
        ];

        // Act: Send a POST request to the store endpoint
        $response = $this->postJson('/selftest', $payload);

        // Assert: Check the response and database
        $response->assertStatus(201); // Created
        $response->assertJson([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
        ]);

        // Ensure the user is saved in the database
        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
        ]);
    }

    public function testUpdateModifiesExistingUser()
    {
        // Arrange: Create a test user
        $user = User::factory()->create([
            'name' => 'Jane Doe',
            'email' => 'janedoe@example.com',
        ]);

        // Prepare the update payload
        $payload = [
            'name' => 'Jane Smith',
            'email' => 'janesmith@example.com',
        ];

        // Act: Send a PUT request to the update endpoint
        $response = $this->putJson("/selftest/{$user->id}", $payload);

        // Assert: Check the response and database
        $response->assertStatus(200);
        $response->assertJson([
            'name' => 'Jane Smith',
            'email' => 'janesmith@example.com',
        ]);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Jane Smith',
            'email' => 'janesmith@example.com',
        ]);
    }

    public function testDestroyDeletesExistingUser()
    {
        // Arrange: Create a test user
        $user = User::factory()->create();

        // Act: Send a DELETE request to the destroy endpoint
        $response = $this->deleteJson("/selftest/{$user->id}");

        // Assert: Check the response and database
        $response->assertStatus(200);
        $response->assertJson(['message' => 'User deleted successfully']);

        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
        ]);
    }


}
