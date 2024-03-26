<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Filament\Pages\HomePage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([DemoUsers::class]);
        DB::table('home_pages')->insert([
            'id' => 1
        ]);
        DB::table('about_pages')->insert([
            'id' => 1
        ]);
        DB::table('contact_pages')->insert([
            'id' => 1
        ]);
    }
}