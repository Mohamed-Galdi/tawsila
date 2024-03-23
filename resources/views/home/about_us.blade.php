@extends('layouts.master')
@section('content')
    <div class="2xl:container 2xl:mx-auto lg:py-6 lg:px-20 md:py-12 md:px-6 py-9 px-4">
        {{-- //////////// Our Story /////////////////// --}}
        <div class="flex flex-col lg:flex-row justify-between gap-8 ">
            <div class="w-1/2 lg:w-5/12 flex flex-col justify-center ">
                <h1 class="text-3xl font-pr lg:text-6xl font-bold leading-9 text-gray-800 dark:text-white pb-4">قصتنا </h1>
                <p class="font-normal font-sec text-2xl text-justify line leading-loose text-gray-600 dark:text-white">بدأت
                    قصتنا برؤية بسيطة: تسهيل عملية نقل الطلاب إلى مدارسهم بأمان وسهولة. تجمعنا في فريق واحد، مؤمنات بأهمية
                    التكنولوجيا في تحسين حياة المجتمع، وبدأنا في بناء منصة "توصيلة" بشغف وإصرار. تطورت الفكرة مع الوقت، وتم
                    توسيع نطاق الخدمات لتشمل العديد من الميزات المبتكرة التي تجعل تجربة النقل المدرسي أكثر سهولة وسلاسة
                    للطلاب وأولياء الأمور. هدفنا هو توفير بيئة آمنة وموثوقة للطلاب وتخفيف عبء القلق عن أولياء الأمور، لنساهم
                    بشكل فعّال في تحقيق تجربة تعليمية مثالية للجميع.</p>
            </div>
            <div class="fade3 w-1/2 flex justify-center">
                <img class="max-w-[600px] h-full" src="./assets/graphics/images/female_devs.png" alt="A group of People" />
            </div>
        </div>
        {{-- //////////// Our Team /////////////////// --}}
        <div class="flex lg:flex-row flex-col justify-between gap-8 pt-12">
            {{-- //////////// Who we are /////////////////// --}}

            <div class="w-full lg:w-5/12 flex flex-col justify-center">
                <h1 class="text-3xl lg:text-4xl font-bold leading-9 text-gray-800 dark:text-white pb-4 font-pr"> من نحن</h1>
                <p class="font-sec text-xl  text-justify">
                    نحن فريق من المطورات العربيات اللاتي يؤمنّ بالقوة الإبداعية للمرأة في مجال تطوير التقنية. قمنا ببناء
                    منصة
                    "توصيلة" باستخدام خبراتنا ومهاراتنا في البرمجة وتصميم الواجهات لتكون تجربة فريدة للمستخدمين. نفتخر بأن
                    نكون
                    جزءًا من تطوير مشاريع تقنية تلبي احتياجات مجتمعنا.</p>
            </div>
            {{-- //////////// Team members /////////////////// --}}

            <div class="w-full lg:w-8/12 lg:pt-8">
                <div class="grid md:grid-cols-4 sm:grid-cols-2 grid-cols-1 lg:gap-4 shadow-lg rounded-md">
                    <div class="p-4 pb-6 flex justify-center flex-col items-center">
                        <img class=" object-cover rounded-lg shadow-lg border-pr border-2"
                            src="./assets/graphics/team/team_dev1.jpg" alt="Alexa featured Image" />
                        <h3 class="font-pr text-3xl  text-gray-800  ">مريم</h3>
                        <p class="font-sec text-center text-md font-bold text-gray-800  mt-1">مطورة نضم الخلفية
                            (backend)</p>
                    </div>
                    <div class="p-4 pb-6 flex justify-center flex-col items-center">
                        <img class=" object-cover rounded-lg shadow-lg border-pr border-2"
                            src="./assets/graphics/team/team_dev5.jpg" alt="Alexa featured Image" />
                        <h3 class="font-pr text-3xl  text-gray-800  ">سارة</h3>
                        <p class="font-sec text-center text-md font-bold text-gray-800  mt-1">مطورة النضم الامامية

                            (frontend)</p>
                    </div>
                    <div class="p-4 pb-6 flex justify-center flex-col items-center">
                        <img class=" object-cover rounded-lg shadow-lg border-pr border-2"
                            src="./assets/graphics/team/team_dev4.jpg" alt="Alexa featured Image" />
                        <h3 class="font-pr text-3xl  text-gray-800  ">سلمى</h3>
                        <p class="font-sec text-center text-md font-bold text-gray-800  mt-1">مصممة الجرافيك
                            (desinger)</p>
                    </div>
                    <div class="p-4 pb-6 flex justify-center flex-col items-center">
                        <img class=" object-cover rounded-lg shadow-lg border-pr border-2"
                            src="./assets/graphics/team/team_dev2.jpg" alt="Alexa featured Image" />
                        <h3 class="font-pr text-3xl  text-gray-800  ">نور</h3>
                        <p class="font-sec text-center text-md font-bold text-gray-800  mt-1">مصممة قواعد البيانات
                            (databases)</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- //////////// FAQs /////////////////// --}}
    <div class="flex justify-center items-start my-24 mx-auto max-w-screen-xl">
        <div class="w-full ">
            <h2 class="font-pr text-5xl text-center">الاسئلة الشائعة</h2>
            <ul class="flex flex-col">
                <li class="bg-white my-2 shadow-lg" x-data="accordion(1)">
                    <h2 @click="handleClick()" class="flex flex-row justify-between items-center p-3 cursor-pointer">
                        <span class="font-pr text-2xl">ما هي منصة "توصيلة"؟</span>
                        <svg :class="handleRotate()"
                            class="fill-current text-tawsila-600 h-6 w-6 transform transition-transform duration-500"
                            viewBox="0 0 20 20">
                            <path
                                d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10">
                            </path>
                        </svg>
                    </h2>
                    <div x-ref="tab" :style="handleToggle()"
                        class="border-l-8 border-pr overflow-hidden max-h-0 duration-500 transition-all bg-soft_black">
                        <p class="p-3 text-white font-sec text-xl ">"توصيلة" هي منصة تطبيقات تقنية تهدف إلى تسهيل عملية نقل
                            الطلاب
                            إلى ومن
                            المدرسة بوسائل النقل المدرسية بشكل آمن ومنظم.
                        </p>
                    </div>
                </li>
                <li class="bg-white my-2 shadow-lg" x-data="accordion(2)">
                    <h2 @click="handleClick()" class="flex flex-row justify-between items-center p-3 cursor-pointer">
                        <span class="font-pr text-2xl">هل يتم تخزين بياناتي الشخصية بشكل آمن على منصة "توصيلة"؟</span>
                        <svg :class="handleRotate()"
                            class="fill-current text-tawsila-600 h-6 w-6 transform transition-transform duration-500"
                            viewBox="0 0 20 20">
                            <path
                                d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10">
                            </path>
                        </svg>
                    </h2>
                    <div x-ref="tab" :style="handleToggle()"
                        class="border-l-8 border-pr overflow-hidden max-h-0 duration-500 transition-all bg-soft_black">
                        <p class="p-3 text-white font-sec text-xl "> نعم، نحرص على سرية وأمان بيانات مستخدمي منصة "توصيلة"
                            وفقًا لأعلى معايير الحماية والخصوصية
                        </p>
                    </div>
                </li>
                <li class="bg-white my-2 shadow-lg" x-data="accordion(3)">
                    <h2 @click="handleClick()" class="flex flex-row justify-between items-center p-3 cursor-pointer">
                        <span class="font-pr text-2xl">كيف يمكنني الحصول على دعم فني في حالة وجود مشكلة تقنية؟</span>
                        <svg :class="handleRotate()"
                            class="fill-current text-tawsila-600 h-6 w-6 transform transition-transform duration-500"
                            viewBox="0 0 20 20">
                            <path
                                d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10">
                            </path>
                        </svg>
                    </h2>
                    <div x-ref="tab" :style="handleToggle()"
                        class="border-l-8 border-pr overflow-hidden max-h-0 duration-500 transition-all bg-soft_black">
                        <p class="p-3 text-white font-sec text-xl ">يمكنك الاتصال بفريق دعم العملاء لدينا عبر البريد
                            الإلكتروني أو الهاتف المدرج في تطبيق "توصيلة" للحصول على المساعدة في حالة وجود أي مشكلة تقنية.
                        </p>
                    </div>
                </li>
                <li class="bg-white my-2 shadow-lg" x-data="accordion(4)">
                    <h2 @click="handleClick()" class="flex flex-row justify-between items-center p-3 cursor-pointer">
                        <span class="font-pr text-2xl">ما هي منصة "توصيلة"؟</span>
                        <svg :class="handleRotate()"
                            class="fill-current text-tawsila-600 h-6 w-6 transform transition-transform duration-500"
                            viewBox="0 0 20 20">
                            <path
                                d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10">
                            </path>
                        </svg>
                    </h2>
                    <div x-ref="tab" :style="handleToggle()"
                        class="border-l-8 border-pr overflow-hidden max-h-0 duration-500 transition-all bg-soft_black">
                        <p class="p-3 text-white font-sec text-xl ">"توصيلة" هي منصة تطبيقات تقنية تهدف إلى تسهيل عملية نقل
                            الطلاب
                            إلى ومن
                            المدرسة بوسائل النقل المدرسية بشكل آمن ومنظم.
                        </p>
                    </div>
                </li>
                <li class="bg-white my-2 shadow-lg" x-data="accordion(5)">
                    <h2 @click="handleClick()" class="flex flex-row justify-between items-center p-3 cursor-pointer">
                        <span class="font-pr text-2xl">هل يتم تخزين بياناتي الشخصية بشكل آمن على منصة "توصيلة"؟</span>
                        <svg :class="handleRotate()"
                            class="fill-current text-tawsila-600 h-6 w-6 transform transition-transform duration-500"
                            viewBox="0 0 20 20">
                            <path
                                d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10">
                            </path>
                        </svg>
                    </h2>
                    <div x-ref="tab" :style="handleToggle()"
                        class="border-l-8 border-pr overflow-hidden max-h-0 duration-500 transition-all bg-soft_black">
                        <p class="p-3 text-white font-sec text-xl "> نعم، نحرص على سرية وأمان بيانات مستخدمي منصة "توصيلة"
                            وفقًا لأعلى معايير الحماية والخصوصية
                        </p>
                    </div>
                </li>
                <li class="bg-white my-2 shadow-lg" x-data="accordion(6)">
                    <h2 @click="handleClick()" class="flex flex-row justify-between items-center p-3 cursor-pointer">
                        <span class="font-pr text-2xl">كيف يمكنني الحصول على دعم فني في حالة وجود مشكلة تقنية؟</span>
                        <svg :class="handleRotate()"
                            class="fill-current text-tawsila-600 h-6 w-6 transform transition-transform duration-500"
                            viewBox="0 0 20 20">
                            <path
                                d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10">
                            </path>
                        </svg>
                    </h2>
                    <div x-ref="tab" :style="handleToggle()"
                        class="border-l-8 border-pr overflow-hidden max-h-0 duration-500 transition-all bg-soft_black">
                        <p class="p-3 text-white font-sec text-xl ">يمكنك الاتصال بفريق دعم العملاء لدينا عبر البريد
                            الإلكتروني أو الهاتف المدرج في تطبيق "توصيلة" للحصول على المساعدة في حالة وجود أي مشكلة تقنية.
                        </p>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    {{-- //////////// FAQs script /////////////////// --}}
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('accordion', {
                tab: 0
            });

            Alpine.data('accordion', (idx) => ({
                init() {
                    this.idx = idx;
                },
                idx: -1,
                handleClick() {
                    this.$store.accordion.tab = this.$store.accordion.tab === this.idx ? 0 : this.idx;
                },
                handleRotate() {
                    return this.$store.accordion.tab === this.idx ? 'rotate-180' : '';
                },
                handleToggle() {
                    return this.$store.accordion.tab === this.idx ?
                        `max-height: ${this.$refs.tab.scrollHeight}px` : '';
                }
            }));
        })
    </script>

    </html>
@endsection
