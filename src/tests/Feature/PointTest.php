<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Point;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PointTest extends TestCase
{
    use RefreshDatabase;

    protected string $baseUrl = 'api/points';


    /**
     * @return void
     */
    public function test_index_success(): void
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


    /**
     * @return void
     */
    public function test_create_success(): void
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


    /**
     * @return void
     */
    public function test_update_success(): void
    {
        $pointData = collect(
            [
                'name' => 'Medison sklep',
                'slug' => 'medison_sklep',
                'description' => 'Lorem Ipsum je.',
            ]
        );
        $pointDataToUpdate = collect(
            [
                'name' => 'new name',
                'slug' => 'new_name',
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
