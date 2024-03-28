<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $areas = [
            "الدوادمي", "الدلم", "الدرعية", "الضبيعة", "عفيف", "الاحمر", "العماجية", "علقه", "الأرطاوية", "البديع الشمالي", "البجادية", "الغاط", "الهدار", "الحريق", "الهياثم", "الحائر", "الحلوة", "الجبيله", "الخرج", "المجمعة", "المزاحمية", "القصب", "القويعية", "العيينة", "الوقف القرائن", "اليمامة", "النايفية", "عرجاء", "الرين", "الرياض", "الرويضة", "الشديده", "الشمال", "السليل", "السلطانيه", "الزلفي", "بنبان", "ضرما", "حرمة", "حوطة سدير", "حوطة بني تميم", "حريملاء", "عرقة", "جلاجل", "ليلى", "ملهم", "مقبولة", "مرات", "نعجان", "ساجر", "شقراء", "تمره", "تمير", "ثادق", "وادي الدواسر"
        ];

        $faker = Faker::create('ar_SA');

        foreach ($areas as $area) {
            Area::create([
                'name' => $area,
                'status' => $faker->randomElement(['مغطاة', 'غير مغطاة']),
            ]);
        };
    }
}
