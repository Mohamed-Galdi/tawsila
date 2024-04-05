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
        
        $faker = Faker::create('ar_SA');

        for ($i = 1; $i <= 16; $i++) {
            
            $total_seats = $faker->randomElement([40, 45, 50, 55, 60, 65]);
            $status = $i == 4 || $i == 2 ? 'خارج الخدمة' : 'متوفر';
            Bus::create([
                'number' => $faker->numberBetween(111111, 999999),
                'image' =>  'busImages/bus_'.$i.'.jpg',
                'total_seats' => $total_seats,
                'available_seats' => $total_seats,
                'status' => $status,
            ]);
        };
    }
}
