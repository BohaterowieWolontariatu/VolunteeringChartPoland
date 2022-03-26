<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SlotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sheduled_at' => $this->faker->dateTimeBetween('now', '+7days'),
            'is_rejected' => $this->faker->boolean(10),
            'is_reserve' => $this->faker->boolean(),
        ];
    }
}
