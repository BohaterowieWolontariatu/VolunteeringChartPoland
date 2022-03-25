<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PointFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $colors = collect(['red', 'blue']);

        return [
            'name' => $this->faker->company,
            'address' => $this->faker->address,
            'color' => $colors->random(),
            'lead' => $this->faker->text(100),
            'description' => $this->faker->sentence(100),
        ];
    }
}
