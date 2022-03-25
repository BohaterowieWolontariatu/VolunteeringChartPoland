<?php

namespace Database\Seeders;

use App\Models\Point;
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
        Point::factory(100)->create();
    }
}
