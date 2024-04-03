<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Subscription;
use App\Models\Trip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class SubscriptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('ar_SA');
        $students = Student::all()->random(13);
        foreach ($students as $student) {
            $trip = Trip::inRandomOrder()->first();
            Subscription::create([
                'student_id' => $student->id,
                'trip_id' => $trip->id,
                'plan' => $faker->randomElement(['3 أشهر', '6 أشهر', '9 أشهر', '12 أشهر']),
                'status' => $faker->randomElement(['1', '0']),
            ]);
        };
    }
}
