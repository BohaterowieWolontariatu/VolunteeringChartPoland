<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\Point;
use App\Models\Slot;
use App\Models\Shift;
use App\Models\User;
use Illuminate\Database\Seeder;

class PointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Point::factory()
            ->count(3)
            ->has(
                Shift::factory()
                    ->count(3)
                    ->has(
                        Slot::factory()
                            ->state(function (array $attributes, Shift $shift) {
                                return ['point_id' => $shift->point->id];
                            })
                            ->for(
                                User::factory()
                            )
                            ->count(10)
                    )

            )
            ->has(User::factory()->count(2))
            ->create();
    }
}
