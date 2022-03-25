<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AgreementTest extends TestCase
{
    protected $baseUri = 'agreement';
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_successfully_create_point()
    {
        $this->actingAs($user = User::factory()->create());

        $data = [
            'name' => 'create test name',
            'address' => 'test address',
            'color' => 'red',
            'lead' => 'lorem ipsum, lorem ipsum, lorem ipsum',
            'description' => 'lorem ipsum, lorem ipsum, lorem ipsum lorem ipsum, lorem ipsum, lorem ipsum lorem ipsum, lorem ipsum, lorem ipsum lorem ipsum, lorem ipsum, lorem ipsum',
        ];


        $response = $this->post(
            $this->makeUrl(),
            $data
        );


        $response
            ->assertStatus(302);

        $this->assertDatabaseHas('points', $data);
    }
}
