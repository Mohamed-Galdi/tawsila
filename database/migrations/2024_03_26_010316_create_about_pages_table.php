<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('about_pages', function (Blueprint $table) {
            $table->id();
            $table->string('our_story', 1000)->default('بدأت قصتنا برؤية بسيطة: تسهيل عملية نقل الطلاب إلى مدارسهم بأمان وسهولة. تجمعنا في فريق واحد، مؤمنات بأهمية التكنولوجيا في تحسين حياة المجتمع، وبدأنا في بناء منصة "توصيلة" بشغف وإصرار. تطورت الفكرة مع الوقت، وتم توسيع نطاق الخدمات لتشمل العديد من الميزات المبتكرة التي تجعل تجربة النقل المدرسي أكثر سهولة وسلاسة للطلاب وأولياء الأمور. هدفنا هو توفير بيئة آمنة وموثوقة للطلاب وتخفيف عبء القلق عن أولياء الأمور، لنساهم بشكل فعّال في تحقيق تجربة تعليمية مثالية للجميع.');
            $table->string('our_story_image')->nullable()->default('ourTeam/female_devs.png');
            $table->string('who_we_are', 1000)->default('نحن فريق من المطورات العربيات اللاتي يؤمنّ بالقوة الإبداعية للمرأة في مجال تطوير التقنية. قمنا ببناء منصة "توصيلة" باستخدام خبراتنا ومهاراتنا في البرمجة وتصميم الواجهات لتكون تجربة فريدة للمستخدمين. نفتخر بأن نكون جزءًا من تطوير مشاريع تقنية تلبي احتياجات مجتمعنا.')->max(600);
            $table->string('1st_team_member_name')->default('مريم')->max(255);
            $table->string('1st_team_member_role')->default('مطورة نضم الخلفية (backend)')->max(255);
            $table->string('1st_team_member_image')->nullable()->default('ourTeam/team_dev1.jpg')->max(255);
            $table->string('2nd_team_member_name')->default('سلمى')->max(255);
            $table->string('2nd_team_member_role')->default('مصممة الجرافيك (desinger)')->max(255);
            $table->string('2nd_team_member_image')->nullable()->default('ourTeam/team_dev4.jpg')->max(255);
            $table->string('3rd_team_member_name')->default('سارة')->max(255);
            $table->string('3rd_team_member_role')->default('مطورة النضم الامامية (frontend)')->max(255);
            $table->string('3rd_team_member_image')->nullable()->default('ourTeam/team_dev5.jpg')->max(255);
            $table->string('4th_team_member_name')->default('نور')->max(255);
            $table->string('4th_team_member_role')->default('مصممة قواعد البيانات (databases)')->max(255);
            $table->string('4th_team_member_image')->nullable()->default('ourTeam/team_dev2.jpg')->max(255);
            $table->string('1st_FAQs', 1000)->max(255)->default('ما هي منصة "توصيلة"؟');
            $table->string('1st_answer', 1000)->max(255)->default('"توصيلة" هي منصة تطبيقات تقنية تهدف إلى تسهيل عملية نقل الطلاب إلى ومن المدرسة بوسائل النقل المدرسية بشكل آمن ومنظم.');
            $table->string('2nd_FAQs', 1000)->max(255)->default('هل يتم تخزين بياناتي الشخصية بشكل آمن على منصة "توصيلة"؟');
            $table->string('2nd_answer', 1000)->max(255)->default('نعم، نحرص على سرية وأمان بيانات مستخدمي منصة "توصيلة" وفقًا لأعلى معايير الحماية والخصوصية');
            $table->string('3rd_FAQs', 1000)->max(255)->default('كيف يمكنني الحصول على دعم فني في حالة وجود مشكلة تقنية؟');
            $table->string('3rd_answer', 1000)->max(255)->default('يمكنك الاتصال بفريق دعم العملاء لدينا عبر البريد الإلكتروني أو الهاتف المدرج في تطبيق "توصيلة" للحصول على المساعدة في حالة وجود أي مشكلة تقنية.');

            $table->string('4th_FAQs', 1000)->max(255)->default('كيف يمكنني الوصول إلى معلومات عن الرحلات والطلاب التي يجب عليّ نقلهم؟');
            $table->string('4th_answer', 1000)->max(255)->default(' بمجرد تسجيلك كسائق في توصيلة، ستحصل على حساب يمكنك استخدامه للوصول إلى معلومات عن الرحلات المقررة وتفاصيل الطلاب الذين يجب عليك نقلهم.');

            $table->string('5th_FAQs', 1000)->max(255)->default(' ما هي الإجراءات في حالة حدوث طارئ أثناء الرحلة؟');
            $table->string('5th_answer', 1000)->max(255)->default('في حالة حدوث طارئ أثناء الرحلة، يجب عليك الاتصال بفريق الدعم الفني لتوصيلة فوراً، حيث سيتم توجيهك بشكل فوري حول الإجراءات اللازمة للتعامل مع الموقف.');
            $table->string('6th_FAQs', 1000)->max(255)->default('هل توفر توصيلة دورات تدريبية للسائقين؟');
            $table->string('6th_answer', 1000)->max(255)->default('نعم، تقدم توصيلة دورات تدريبية متخصصة للسائقين تركز على السلامة والتواصل مع الطلاب ومهارات القيادة الفعالة.');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_pages');
    }
};
