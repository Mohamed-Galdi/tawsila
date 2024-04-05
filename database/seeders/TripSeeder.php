<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Bus;
use App\Models\Driver;
use App\Models\Trip;
use App\Models\University;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {
    //     $faker = Faker::create('ar_SA');
    //     $drivers = Driver::inRandomOrder()->limit(Bus::all()->count())->get() ;

    //     $buses = Bus::all();
    //     foreach ($buses as $bus) {
    //         $times = $faker->randomElement([1, 2]);
    //         $trip = Trip::create([
    //             'university_id' => University::all()->random()->id,
    //             'bus_id' => $bus->id,
    //             'driver_id' => $drivers[$bus->id],
    //             'times_per_day' => $times,
    //             'first_going_time' => $faker->randomElement(['07:00', '07:30', '08:00', '08:30', '09:00', '09:30', '10:00']),
    //             'first_return_time' => $faker->randomElement(['10:00', '10:30', '11:00', '11:30', '12:00', '12:30', '13:00']),
    //             'second_going_time' => $times == 2 ? $faker->randomElement(['11:00','11:30','12:00','12:30','13:00','13:30','14:00']) : null,
    //             'second_return_time' => $times == 2 ? $faker->randomElement(['15:00','15:30','16:00','16:30','17:00','17:30','18:00','18:30']) : null,
    //         ]);
    //         $areas = Area::inRandomOrder()->limit($faker->numberBetween(3, 5))->pluck('id');
    //         $trip->areas()->sync($areas);
    //     }
    // }
    public function run(): void
    {
        $faker = Faker::create('ar_SA');

        $universities = University::all()->pluck('id')->toArray();
        $areas = Area::all()->pluck('id')->toArray();

        $usedBuses = [];
        $usedDrivers = [];

        for ($i = 0; $i < 10; $i++) {
            $driver = Driver::where('status', 'تم التوثيق')
                ->whereNotIn('id', $usedDrivers)
                ->inRandomOrder()
                ->first();

            $usedDrivers[] = $driver->id;

            $bus = Bus::where('status', 'متوفر')
                ->whereNotIn('id', $usedBuses)
                ->first();

            $usedBuses[] = $bus->id;

            $times = $faker->randomElement([1, 2]);

            $trip = Trip::create([
                'university_id' => $faker->randomElement($universities),
                'bus_id' => $bus->id,
                'driver_id' => $driver->id,
                'times_per_day' => $times,
                'first_going_time' => $faker->randomElement(['07:00', '07:30', '08:00', '08:30', '09:00', '09:30', '10:00']),
                'first_return_time' => $faker->randomElement(['10:00', '10:30', '11:00', '11:30', '12:00', '12:30', '13:00']),
                'second_going_time' => $times == 2 ? $faker->randomElement(['11:00', '11:30', '12:00', '12:30', '13:00', '13:30', '14:00']) : null,
                'second_return_time' => $times == 2 ? $faker->randomElement(['15:00', '15:30', '16:00', '16:30', '17:00', '17:30', '18:00', '18:30']) : null,
            ]);

            $trip->areas()->sync($faker->randomElements($areas, $faker->numberBetween(3, 5)));
        }
    }
}
