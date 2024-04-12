<?php

namespace Database\Seeders;

use App\Models\Subscription;
use App\Models\TripRating;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class TripRatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positiveRateDescriptions = [
            "خدمة ممتازة، أوصي بها بشدة!",
            "تجربة رائعة، أنا سعيد جداً بالخدمة.",
            "شكراً لكم على الخدمة الرائعة!",
            "فريق رائع وخدمة ممتازة!",
            "أسعدتموني بخدمتكم المتميزة!",
            "تجربة مذهلة، لن أتردد في التواصل معكم مرة أخرى.",
            "خدمة سريعة وفعالة، أنا ممتن جداً.",
            "أعجبتني جودة الخدمة والاحترافية في التعامل.",
            "خدمة رائعة بكل المقاييس، شكراً جزيلاً!",
            "سعيد بتعاملي معكم، لن أتردد في التواصل معكم مرة أخرى.",
            "لا يوجد كلمات تعبر عن امتناني لخدمتكم الرائعة!",
            "خدمة استثنائية، أنا مسرور جداً.",
            "تعاملت مع العديد من الشركات، ولكنكم الأفضل بلا منازع.",
            "مهنية عالية وخدمة رائعة، شكراً لكم.",
            "لقد جعلتم يومي بخدمتكم الرائعة!",
            "سررت بالتعامل مع فريقكم المتميز، شكراً لكم.",
            "خدمة ممتازة وتعامل راقي، أنا مسرور بشكل كبير.",
            "تجربة فريدة وممتعة، شكراً لكم على الجهد الكبير.",
            "لا يمكنني إلا أن أوصي بخدمتكم للجميع!",
            "ما أروع التعامل معكم، أنتم الأفضل بكل معنى الكلمة.",
        ];
        $faker = Faker::create('ar_SA');
        $subs = Subscription::all();
        foreach ($subs as $sub) {
            TripRating::create([
                'student_id' => $sub->student_id,
                'trip_id' => $sub->trip_id,
                'rate' => $faker->randomElement([4, 5]), 'description' => $positiveRateDescriptions[array_rand($positiveRateDescriptions)],
            ]);
        };
    }
}
