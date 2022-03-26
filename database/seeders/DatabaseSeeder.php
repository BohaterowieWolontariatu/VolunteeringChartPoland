<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        User::factory()->create(
            [
                'email' => 'admin@example.com'
            ]
        );
        Language::factory()->count(2)->create();
        User::factory(10)->create();

        $this->call(
            [
                PointSeeder::class,
            ]
        );
    }
}
