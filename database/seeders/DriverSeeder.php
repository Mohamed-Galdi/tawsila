<?php

namespace Database\Seeders;

use App\Models\Driver;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('ar_SA');
        for ($i = 1; $i <= 16; $i++) {
            $user = User::create([
                'name' => $faker->firstNameMale() .' '. $faker->lastName(),
                'email' => $faker->email,
                'password' => $faker->password,
                'role' => 'driver',
                'image' => 'ourDrivers/driver_' . $i . '.jpg',
            ]);
            $status = ($i == 2) ? 'مرفوض' : (($i == 4) ? 'قيد المراجعة' :'تم التوثيق');
            Driver::create([
                'user_id' => $user->id,
                'license_number' => $faker->numberBetween(111111,999999),
                'license_image' => 'drivers_licenses/driver_license.png',
                'status' => $status,

            ]);
        };
    }
}
