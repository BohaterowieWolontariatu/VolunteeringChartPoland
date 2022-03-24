<?php

namespace Tests\Feature;

use App\Models\Point;
use Database\Factories\PointFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class PointTest extends TestCase
{
    use RefreshDatabase;

    protected $baseUrl = 'api/points';


    public function test_index_success()
    {
        $pointCount = 3;

        $points = Point::factory()->count($pointCount)->create()->sortBy('name')->values();
        $point = $points->first();


        $response = $this->get(
            $this->getBaseUrl(),
        );

        $response
            ->assertStatus(200)
            ->assertJson(fn(AssertableJson $json) => $json
                ->has('meta', fn($json) => $json
                    ->where('total', $pointCount)
                    ->etc())
                ->has('links')
                ->has('data', 3, fn($json) => $json
                    ->where('id', $point->id)
                    ->where('slug', $point->slug)
                    ->where('description', $point->description)
                    ->etc()
                )
            );
    }


    public function test_create_success()
    {
        $pointData = [
            'name' => 'Medison sklep',
            'slug' => 'Medison sklep',
            'description' => 'Lorem Ipsum je.',
        ];
        $response = $this->post(
            $this->getBaseUrl(),
            $pointData
        );

        $response->assertStatus(201)
            ->assertJson(fn(AssertableJson $json) => $json
                ->has('data', fn($json) => $json
                    ->whereAll(
                        $pointData
                    )
                    ->etc()
                )
            );
    }


    public function test_update_success()
    {
        $pointData = collect(
            [
                'name' => 'Medison sklep',
                'slug' => 'Medison sklep',
                'description' => 'Lorem Ipsum je.',
            ]
        );
        $pointDataToUpdate = collect(
            [
                'name' => 'new name',
                'slug' => 'Medison sklep',
                'description' => 'Lorem Ipsum je.',
            ]
        );


        $point = Point::factory()->create($pointData->toArray());


        $response = $this->put(
            $this->getBaseUrl() . '/' . $point->id,
            $pointDataToUpdate->toArray()
        );

        $response
            ->assertStatus(200)
            ->assertJson(fn(AssertableJson $json) => $json
                ->has('data', fn($json) => $json
                    ->whereAll(
                        $pointData
                            ->merge(
                                $pointDataToUpdate->toArray()
                            )
                            ->toArray()
                    )
                    ->etc()
                )
            );
    }


    /**
     * @return string
     */
    protected function getBaseUrl(): string
    {
        return $this->baseUrl;
    }
}
