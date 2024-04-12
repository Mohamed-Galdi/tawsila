<?php

namespace Database\Seeders;

use App\Models\Driver;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemoUsers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Demo Admin --------------------------------------------------------------------------------
        $Admin = [
            'name' => 'Admin',
            'email' => 'admin@demo.com',
            'password' => '00000000',
            'role' => 'admin'
        ];
        User::create($Admin);

        // Demo Student --------------------------------------------------------------------------------
        $student = User::create([
            'name' => 'داليا التويجري',
            'email' => 'student@demo.com',
            'password' => '000000',
            'role' => 'student',
            'image' => 'ourTeam/team_dev5.jpg',
            // 'avatar_url' => './storage/ourTeam/team_dev5.jpg',
            
        ]);
        Student::create(['user_id' => $student->id]);

        // Demo Driver --------------------------------------------------------------------------------
        $driver = User::create([
            'name' => 'محمد عمر',
            'email' => 'driver@demo.com',
            'password' => '000000',
            'role' => 'driver',
            'image' => 'ourDrivers/driver_12.jpg',
            // 'avatar_url' => './storage/ourDrivers/driver_12.jpg',
        ]);
        Driver::create([
            'user_id' => $driver->id,
            'license_number' => '111111',
            'license_image' => 'drivers_licenses/driver_license.png',
            'status' => 'تم التوثيق',
            'experience' => '8'

        ]);
    }
}
