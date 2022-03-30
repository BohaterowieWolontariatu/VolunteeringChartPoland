<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'email' => 'admin@example.com',
                'has_agreement_signed' => true,
                'is_admin' => true,
            ]
        );
        Language::factory()->count(2)->create();
        User::factory(10)->create();

//        $this->call(
//            [
//                PointSeeder::class,
//            ]
//        );

        $path = public_path('sql/points.sql');
        $sql = file_get_contents($path);
        DB::unprepared($sql);
    }
}
