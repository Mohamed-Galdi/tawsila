<?php

namespace Database\Seeders;

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
        $Admin = [
            'name' => 'Admin',
            'email' => 'admin@demo.com',
            'password' => '00000000',
            'role' => 'admin'
        ];
        $Student = [
            'name' => 'Student',
            'email' => 'student@demo.com',
            'password' => '000000',
            'role' => 'student'
        ];
        $Driver = [
            'name' => 'Driver',
            'email' => 'driver@demo.com',
            'password' => '000000',
            'role' => 'driver'
        ];

        User::create($Admin);
        User::create($Student);
        User::create($Driver);
    }
}
