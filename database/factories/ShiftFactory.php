<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ShiftFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $date = Carbon::make($this->faker->dateTime);

        return [
            'name' => $this->faker->text(100),
            'capacity' => $this->faker->numberBetween(1, 10),
            'start_time' => $date->format('H:i'),
            'end_time' => $date->addMinutes($this->faker->numberBetween(60, 5 * 60))->format('H:i'),
        ];
    }


}
