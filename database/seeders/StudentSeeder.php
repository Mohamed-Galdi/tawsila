<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void

    {
        $faker = Faker::create('ar_SA');
        for ($i = 1; $i <= 31; $i++) {
            $user = User::create([
                'name' => $faker->name('female'),
                'email' => $faker->email,
                'password' => $faker->password,
                'role' => 'student',
                'image' => 'studentsImages/student_' . $i . '.jpg',
            ]);
            Student::create(['user_id' => $user->id]);
        };
    }
}
