<?php

namespace Database\Seeders;

use App\Models\University;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $universities = [
            'كليات الرؤية.',
            'جامعة رياض العلم.',
            'جامعة دار العلوم.',
            'جامعة الملك سعود.',
            'جامعة الملك سعود بن عبد العزيز للعلوم الصحية.',
            'جامعة المعرفة.',
            'جامعة الفيصل.',
            'جامعة الأميرة نورة بنت عبدالرحمن.',
            'جامعة الامير سلطان.',
            'الجامعة العربية المفتوحة.',
        ];
        $faker = Faker::create('ar_SA');

        foreach ($universities as $univ) {

            University::create([
                'name' => $univ,
                'image' => 'ourUniversities/' . $univ .'png' ,
                'address' => $faker->streetAddress(),
            ]);
        }
    }
}
