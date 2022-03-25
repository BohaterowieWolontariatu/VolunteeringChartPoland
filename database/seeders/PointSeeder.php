<?php

namespace Database\Seeders;

use App\Models\Point;
use App\Models\PointSlot;
use App\Models\Shift;
use App\Models\User;
use Database\Factories\PointsFactory;
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
                    PointSlot::factory()
                        ->state(function (array $attributes, Shift $shift) {
                            return ['point_id' => $shift->point->id];
                        })
                        ->for(
                            User::factory()
                        )
                        ->count(10)
                )

            )
//            ->hasShifts(3)
            ->create();
    }
}
