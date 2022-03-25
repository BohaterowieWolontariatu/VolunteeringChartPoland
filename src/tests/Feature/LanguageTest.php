<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Point;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LanguageTest extends TestCase
{
    use RefreshDatabase;

    protected string $baseUrl = 'api/languages';


    /**
     * @return void
     */
    public function test_index_success(): void
    {
        $languageCount = 3;

        $languages = Point::factory()->count($languageCount)->create()->sortBy('name')->values();
        $language = $languages->first();


        $response = $this->get(
            $this->getBaseUrl(),
        );

        $response
            ->assertStatus(200)
            ->assertJson(fn(AssertableJson $json) => $json
                ->has('meta', fn($json) => $json
                    ->where('total', $languageCount)
                    ->etc())
                ->has('links')
                ->has('data', 3, fn($json) => $json
                    ->where('id', $language->id)
                    ->where('code', $language->code)
                    ->where('name', $language->name)
                    ->etc()
                )
            );
    }


    /**
     * @return void
     */
    public function test_create_success(): void
    {
        $languageData = [
            'name' => 'Test',
            'code' => 'PL',
        ];
        $response = $this->post(
            $this->getBaseUrl(),
            $data
        );

        $response
            ->assertStatus(302);

        $this->assertDatabaseHas('points', $data);
    }


    /**
     * @return void
     */
    public function test_update_success(): void
    {
        $languageData = [
            'name' => 'Test',
            'code' => 'PL',
        ];

        $languageDataToUpdate = collect(
            [
                'name' => 'new name',
                'slug' => 'new_name',
                'description' => 'Lorem Ipsum je.',
            ]
        );


        $language = Point::factory()->create($languageData->toArray());


        $response = $this->put(
            $this->getBaseUrl() . '/' . $language->id,
            $languageDataToUpdate->toArray()
        );

        $response
            ->assertStatus(200)
            ->assertJson(fn(AssertableJson $json) => $json
                ->has('data', fn($json) => $json
                    ->whereAll(
                        $languageData
                            ->merge(
                                $languageDataToUpdate->toArray()
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
