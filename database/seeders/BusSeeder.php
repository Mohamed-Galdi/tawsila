<?php

namespace Database\Seeders;

use App\Models\Bus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $busImages = [
            'busImages/bus_1.jpg',
            'busImages/bus_2.jpg',
            'busImages/bus_3.jpg',
            'busImages/bus_4.jpg',
            'busImages/bus_5.jpg',
            'busImages/bus_6.jpg',
            'busImages/bus_7.jpg',
            'busImages/bus_8.jpg',
            'busImages/bus_9.jpg',
        ];
        $faker = Faker::create('ar_SA');

        foreach ($busImages as $image) {

            $total_seats = $faker->randomElement([40, 45, 50, 55, 60, 65]);
            $status = $faker->randomElement(['متوفر', 'خارج الخدمة', 'ممتلئ']);
            Bus::create([
                'number' => $faker->numberBetween(111111, 999999),
                'image' => $image,
                'total_seats' => $total_seats,
                'available_seats' => $status == 'ممتلئ' ? 0 : $total_seats,
                'status' => $status,
            ]);
        }
    }
}
