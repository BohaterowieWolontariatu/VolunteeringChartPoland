<?php

namespace Tests\Feature;

use App\Models\Point;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PointCrudTest extends TestCase
{
    use RefreshDatabase;

    protected string $baseUri = '/points';


    public function test_points_can_be_list()
    {
        $this->actingAs($user = User::factory()->create());
        $itemCount = 10;

        $items = Point::factory()
            ->count($itemCount)
            ->create()
            ->sortBy('name')
            ->values();

        $item = $items->first();

        $response = $this->get(
            $this->makeUrl()
        );

        $response
            ->assertStatus(200)
            ->assertJson(fn(AssertableJson $json) => $json
                ->has('meta', fn($json) => $json
                    ->where('total', $itemCount)
                    ->etc())
                ->has('links')
                ->has('data', $itemCount, fn($json) => $json
                    ->where('id', $item->id)
                    ->where('name', $item->name)
                    ->where('description', $item->description)
                    ->where('address', $item->address)
                    ->etc()
                )
            );
    }


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


    public function test_can_successfully_update_point()
    {
        $this->actingAs($user = User::factory()->create());

        $item = Point::factory()->create();


        $data = [
            'name' => 'test name',
            'address' => 'address',
            'color' => 'red',
            'lead' => 'lorem ipsum, lorem ipsum, lorem ipsum',
            'description' => 'lorem ipsum, lorem ipsum, lorem ipsum lorem ipsum, lorem ipsum, lorem ipsum lorem ipsum, lorem ipsum, lorem ipsum lorem ipsum, lorem ipsum, lorem ipsum',
        ];


        $response = $this->put(
            $this->makeUrl($item->id),
            $data
        );


        $response
            ->assertStatus(302);

        $this->assertDatabaseHas(
            'points',
            array_merge(
                [
                    id => $item->id,
                ],
                $data
            )
        );
    }


    public function test_can_successfully_delate_point()
    {
        $this->actingAs($user = User::factory()->create());

        $item = Point::factory()->create();

        $response = $this->delete(
            $this->makeUrl($item->id)
        );


        $response
            ->assertStatus(302);

        $this->assertModelMissing($item);
    }


    protected function makeUrl($url = ''): string
    {
        return rtrim(rtrim($this->baseUri, '/') . '/' . ltrim($url, '/'), '/');
    }
}
