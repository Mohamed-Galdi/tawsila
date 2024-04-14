<?php

namespace Database\Seeders;

use App\Models\GuestMessage;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class GuestMessages extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guestMessages = [
            "أود الاستفسار عن توقيت وصول الحافلة.",
            "هل يمكنني الحصول على معلومات حول توقيت المغادرة؟",
            "أرجو التأكد من توفير مقعد مريح على الحافلة.",
            "أود معرفة مواقف الحافلة على الطريق.",
            "هل يمكنني تغيير نقطة الانطلاق؟",
            "أرجو الانتباه إلى تأخير الحافلة.",
            "هل يوجد رحلة إضافية اليوم؟",
            "أود معرفة تفاصيل حول جدول الرحلات.",
            "هل يمكنني التقديم للانضمام كسائق للحافلة؟",
            "أرجو مساعدتي في تحديد موقع الحافلة اليوم."
        ];
        $faker = Faker::create('ar_SA');

        foreach ($guestMessages as $message) {

            GuestMessage::create([
                'name' => $faker->firstNameMale() . ' ' . $faker->lastName(),
                'email' => $faker->email,
                'message' => $message,
                'replied' => rand(0, 1),'created_at' => Carbon::now()->subMinutes(rand(60, 120))
            ]);
        }
    }
}
