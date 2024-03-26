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
        Schema::create('home_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('توصيلة، رحلة آمنة إلى عالم المعرفة');
            $table->string('subtitle')->default('احجز مقعدًا في توصيلة، واكتشف معنى السلامة والراحة واستمتع برحلة آمنة نحو مستقبلك المشرق');

            $table->string('our_university_title')->default('خدمات النقل لازيد من 10 جامعات في الرياض');
            $table->string('our_university_1')->default('./assets/graphics/unv_logos/الجامعة العربية المفتوحة.png');
            $table->string('our_university_2')->default('./assets/graphics/unv_logos/جامعة الأميرة نورة بنت عبدالرحمن.png');
            $table->string('our_university_3')->default('./assets/graphics/unv_logos/جامعة الملك سعود.png');
            $table->string('our_university_4')->default('./assets/graphics/unv_logos/جامعة الامير سلطان.png');
            $table->string('our_university_5')->default('./assets/graphics/unv_logos/جامعة الفيصل.png');
            $table->string('our_university_6')->default('./assets/graphics/unv_logos/جامعة الملك سعود بن عبد العزيز للعلوم الصحية.png');
            $table->string('our_university_7')->default('./assets/graphics/unv_logos/جامعة المعرفة.png');
            $table->string('our_university_8')->default('./assets/graphics/unv_logos/جامعة دار العلوم.png');
            $table->string('our_university_9')->default('./assets/graphics/unv_logos/جامعة رياض العلم.png');
            $table->string('our_university_10')->default('./assets/graphics/unv_logos/كليات الرؤية.png');

            $table->string('our_services')->default('إكتشف مختلف خدماتنا ذات الجودة العالية');
            $table->string('1st_service_title')->default('تغطية شاملة');
            $table->string('1st_service_text')->default('تشمل خدمات "توصيلة" رحلات لجميع الكليات و الجامعات في مدينة الرياض');
            $table->string('1st_service_image')->default('./assets/graphics/service_img/universities.jpg');
            $table->string('2nd_service_title')->default('أفضل السائقين');
            $table->string('2nd_service_text')->default('رحلات يقودها أجود السائقين الذين تم إختيارهم بعناية لضمان أفضل الرحلات');
            $table->string('2nd_service_image')->default('./assets/graphics/service_img/drivers.jpg');
            $table->string('3rd_service_title')->default('أحدث الحافلات');
            $table->string('3rd_service_text')->default('أسطول من أحدث الحافلات بمعايير عالمية لضمان الراحة و الامان');
            $table->string('3rd_service_image')->default('./assets/graphics/services_img/buses.jpg');

            $table->string('steps')->default('ابدأ الآن من خلال 4 خطوات فقط');
            $table->string('1st_step_title')->default('أنشئ حسابك');
            $table->string('1st_step_text')->default('قم بإنشاء حسابك بكل سهولة، و كن جزء من مجتمع "توصيلة"');
            $table->string('2nd_step_title')->default('تصفح الرحلات');
            $table->string('2nd_step_text')->default('تصفح مجموعة واسعة من الرحلات، بفضل أدواتنا المتطورة في البحث');
            $table->string('3rd_step_title')->default('إشترك في رحلة');
            $table->string('3rd_step_text')->default('إشترك في الرحلة التي تناسبك، و تحكم في حسابك و إشتراكك بسلاسة');
            $table->string('4th_step_title')->default('إستلم تأكيد الإشتراك');
            $table->string('4th_step_text')->default('أحصل في الحين على تأكيد إشتراكك، و إستفد من خدماتنا ذات الجودة العالية');

            $table->string('drivers')->default('تعرف على طاقم السائقين');
            $table->string('driver_1_name')->default('عمر الجدي');
            $table->string('driver_1_exp')->default(' 5 سنوات خبرة');
            $table->string('driver_1_image')->default('./assets/graphics/homeDrivers-images/driver_6.jpg');

            $table->string('driver_2_name')->default(' حسين الحارثي');
            $table->string('driver_2_exp')->default(' 6 سنوات خبرة');
            $table->string('driver_2_image')->default('./assets/graphics/homeDrivers-images/driver_5.jpg');

            $table->string('driver_3_name')->default('علي السلمان');
            $table->string('driver_3_exp')->default(' 11 سنوات خبرة');
            $table->string('driver_3_image')->default('./assets/graphics/homeDrivers-images/driver_3.jpg');

            $table->string('driver_4_name')->default('أحمد العتيبي');
            $table->string('driver_4_exp')->default(' 8 سنوات خبرة');
            $table->string('driver_4_image')->default('./assets/graphics/homeDrivers-images/driver_2.jpg');

            $table->string('driver_5_name')->default('سلمان الشريف');
            $table->string('driver_5_exp')->default(' 8 سنوات خبرة');
            $table->string('driver_5_image')->default('./assets/graphics/homeDrivers-images/driver_1.jpg');

            $table->string('driver_6_name')->default('ناصر السهلي');
            $table->string('driver_6_exp')->default(' 8 سنوات خبرة');
            $table->string('driver_6_image')->default('./assets/graphics/homeDrivers-images/driver_14.jpg');

            $table->string('driver_7_name')->default('عبدالعزيز العقيل');
            $table->string('driver_7_exp')->default(' 13 سنوات خبرة');
            $table->string('driver_7_image')->default('./assets/graphics/homeDrivers-images/driver_7.jpg');

            $table->string('driver_8_name')->default('محمود الخضيري');
            $table->string('driver_8_exp')->default(' 12 سنوات خبرة');
            $table->string('driver_8_image')->default('./assets/graphics/homeDrivers-images/driver_8.jpg');

            $table->string('driver_9_name')->default('سعود العنزي');
            $table->string('driver_9_exp')->default(' 9 سنوات خبرة');
            $table->string('driver_9_image')->default('./assets/graphics/homeDrivers-images/driver_11.jpg');

            $table->string('driver_10_name')->default('خالد الفهد');
            $table->string('driver_10_exp')->default(' 8 سنوات خبرة');
            $table->string('driver_10_image')->default('./assets/graphics/homeDrivers-images/driver_15.jpg');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_pages');
    }
};
