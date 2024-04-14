<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserMessage;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class UsersMessages extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userMessages = [
            "أين يمكنني الانتظار للحافلة؟",
            "هل يمكن تغيير مسار الحافلة غدًا؟",
            "أرجو تأخير موعد توقف الحافلة بضع دقائق اليوم.",
            "هل يمكن توفير مقعد قريب من الباب؟",
            "أرجو الانتباه إلى تأخر الحافلة اليوم.",
            "لقد نسيت حقيبتي على الحافلة، هل يمكنكم المساعدة؟",
            "هل يمكن تغيير موعد وصول الحافلة؟",
            "أرجو تقديم طلب لتغيير مكان النزول.",
            "هل يوجد تأخير في الحافلة اليوم؟",
            "أريد معرفة مواعيد الرحلات القادمة."
        ];
        $userReplies = [
            "توقف الحافلة في الموقع المعتاد.",
            "نأسف، لا يمكن تغيير مسار الحافلة في الوقت الحالي.",
            "تم تأخير موعد التوقف بخمس دقائق.",
            "نعم، يمكن توفير مقعد قريب من الباب.",
            "تم اتخاذ العلم بتأخر الحافلة، شكراً على التنبيه.",
            "سنقوم بالتحقق من وجود حقيبتك وإعادتها إليك في أقرب وقت ممكن.",
            "نأسف على الإزعاج، تم تغيير موعد وصول الحافلة.",
            "تم تقديم الطلب لتغيير مكان النزول.",
            "نعم، هناك تأخير طارئ وسنبذل قصارى جهدنا لتقديم الخدمة بأسرع وقت ممكن.",
            "يمكنك الاطلاع على مواعيد الرحلات القادمة من خلال التطبيق."
        ];
        $userRoles = ['student', 'driver'];

        foreach ($userMessages as $index => $message) {
            $userId = User::where('role', Arr::random($userRoles))->inRandomOrder()->first()->id;
            $reply = rand(0, 1) ? $userReplies[$index] : null;
            $repliedAt = $reply ? Carbon::now()->subMinutes(rand(1, 50)) : null;
            $replied = $reply ? true : false;

            UserMessage::create([
                'user_id' => $userId,
                'message' => $message,
                'reply' => $reply,
                'replied_at' => $repliedAt,
                'replied' => $replied,
                'created_at' => Carbon::now()->subMinutes(rand(60,120))
            ]);
        }
    }
}
