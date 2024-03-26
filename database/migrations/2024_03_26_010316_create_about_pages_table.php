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
            $table->longText('our_story')->default('بدأت قصتنا برؤية بسيطة: تسهيل عملية نقل الطلاب إلى مدارسهم بأمان وسهولة. تجمعنا في فريق واحد، مؤمنات بأهمية التكنولوجيا في تحسين حياة المجتمع، وبدأنا في بناء منصة "توصيلة" بشغف وإصرار. تطورت الفكرة مع الوقت، وتم توسيع نطاق الخدمات لتشمل العديد من الميزات المبتكرة التي تجعل تجربة النقل المدرسي أكثر سهولة وسلاسة للطلاب وأولياء الأمور. هدفنا هو توفير بيئة آمنة وموثوقة للطلاب وتخفيف عبء القلق عن أولياء الأمور، لنساهم بشكل فعّال في تحقيق تجربة تعليمية مثالية للجميع.')->max(600);
            $table->string('our_story_image')->nullable();
            $table->longText('who_we_are')->default('نحن فريق من المطورات العربيات اللاتي يؤمنّ بالقوة الإبداعية للمرأة في مجال تطوير التقنية. قمنا ببناء منصة "توصيلة" باستخدام خبراتنا ومهاراتنا في البرمجة وتصميم الواجهات لتكون تجربة فريدة للمستخدمين. نفتخر بأن نكون جزءًا من تطوير مشاريع تقنية تلبي احتياجات مجتمعنا.')->max(600);
            $table->string('who_we_are_image')->nullable();
            $table->string('1st_team_member_name')->default('مريم')->max(255);
            $table->string('1st_team_member_role')->default('مطورة نضم الخلفية (backend)')->max(255);
            $table->string('1st_team_member_image')->nullable()->max(255);
            $table->string('2nd_team_member_name')->default('سلمى')->max(255);
            $table->string('2nd_team_member_role')->default('مصممة الجرافيك (desinger)')->max(255);
            $table->string('2nd_team_member_image')->nullable()->max(255);
            $table->string('3rd_team_member_name')->default('سارة')->max(255);
            $table->string('3rd_team_member_role')->default('مطورة النضم الامامية (frontend)')->max(255);
            $table->string('3rd_team_member_image')->nullable()->max(255);
            $table->string('4th_team_member_name')->default('نور')->max(255);
            $table->string('4th_team_member_role')->default('مصممة قواعد البيانات (databases)')->max(255);
            $table->string('4th_team_member_image')->nullable()->max(255);
            $table->text('1st_FAQs')->max(255)->default('ما هي منصة "توصيلة"؟');
            $table->text('1st_answer')->max(255)->default('"توصيلة" هي منصة تطبيقات تقنية تهدف إلى تسهيل عملية نقل الطلاب إلى ومن المدرسة بوسائل النقل المدرسية بشكل آمن ومنظم.');
            $table->text('2nd_FAQs')->max(255)->default('هل يتم تخزين بياناتي الشخصية بشكل آمن على منصة "توصيلة"؟');
            $table->text('2nd_answer')->max(255)->default('نعم، نحرص على سرية وأمان بيانات مستخدمي منصة "توصيلة" وفقًا لأعلى معايير الحماية والخصوصية');
            $table->text('3rd_FAQs')->max(255)->default('كيف يمكنني الحصول على دعم فني في حالة وجود مشكلة تقنية؟');
            $table->text('3rd_answer')->max(255)->default('يمكنك الاتصال بفريق دعم العملاء لدينا عبر البريد الإلكتروني أو الهاتف المدرج في تطبيق "توصيلة" للحصول على المساعدة في حالة وجود أي مشكلة تقنية.');
            $table->text('4th_FAQs')->max(255)->default('ما هي منصة "توصيلة"؟');
            $table->text('4th_answer')->max(255)->default('"توصيلة" هي منصة تطبيقات تقنية تهدف إلى تسهيل عملية نقل الطلاب إلى ومن المدرسة بوسائل النقل المدرسية بشكل آمن ومنظم.');
            $table->text('5th_FAQs')->max(255)->default('هل يتم تخزين بياناتي الشخصية بشكل آمن على منصة "توصيلة"؟');
            $table->text('5th_answer')->max(255)->default('نعم، نحرص على سرية وأمان بيانات مستخدمي منصة "توصيلة" وفقًا لأعلى معايير الحماية والخصوصية');
            $table->text('6th_FAQs')->max(255)->default('كيف يمكنني الحصول على دعم فني في حالة وجود مشكلة تقنية؟');
            $table->text('6th_answer')->max(255)->default('يمكنك الاتصال بفريق دعم العملاء لدينا عبر البريد الإلكتروني أو الهاتف المدرج في تطبيق "توصيلة" للحصول على المساعدة في حالة وجود أي مشكلة تقنية.');
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
