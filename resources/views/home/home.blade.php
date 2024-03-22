@extends('layouts.master')
@section('content')
    {{-- //////////////////////// Header ///////////////////// --}}
    <div class="bg-pr ">
        <div class="h-[90vh] max-h-[700px] bg-pr flex mx-auto max-w-screen-xl ">
            {{-- Left Side --}}
            <div class="bg-greeen-500 w-1/2 flex flex-col justify-center items-center gap-2">
                <h1 class="fade text-soft_black font-pr text-7xl text-center p-4 ">
                    توصيلة، رحلة آمنة إلى عالم المعرفة
                </h1>
                <h2 class="fade1 text-center font-sec text-3xl font-normal">
                    احجز مقعدًا في توصيلة، واكتشف معنى السلامة والراحة واستمتع برحلة آمنة نحو مستقبلك المشرق
                </h2>
                <div class="fade2 mt-8 flex justify-center gap-12 w-full">
                    <button
                        class="px-4 z-30 py-2 bg-soft_black rounded-md text-white hover:text-soft_black relative font-semibold font-sans after:-z-20 after:absolute after:h-1 after:w-1 after:bg-white after:left-5 overflow-hidden after:bottom-0 after:translate-y-full after:rounded-md after:hover:scale-[300] after:hover:transition-all after:hover:duration-700 after:transition-all after:duration-700 transition-all duration-700  text-2xl">
                        إشترك الان
                    </button>
                    <button
                        class="px-4 z-30 py-2 bg-white rounded-md text-soft_black hover:text-white relative font-semibold font-sans after:-z-20 after:absolute after:h-1 after:w-1 after:bg-soft_black after:left-5 overflow-hidden after:bottom-0 after:translate-y-full after:rounded-md after:hover:scale-[300] after:hover:transition-all after:hover:duration-700 after:transition-all after:duration-700 transition-all duration-700  text-2xl">
                        تصفح الرحلات
                    </button>
                </div>
            </div>
            {{-- Right Side --}}
            <div class="bg-reed-500 w-1/2 relative ">
                <img class="bus w-4/5 absolute left-[10%] top-[10%] drop-shadow-md"
                    src="./assets/graphics/images/the_bus.png" alt="">
            </div>
        </div>
    </div>
    {{-- //////////////////////// Header ///////////////////// --}}
    <div class="bg-soft_black">
        <div class="mx-auto max-w-screen-xl">
            <!-- Clients -->
            <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
                <!-- Title -->
                <div class=" mx-auto text-center mb-6 md:mb-12">
                    <h2 class="font-sec  text-xl font-semibold md:text-4xl md:leading-tight text-gray-200">
                        خدمات النقل لازيد من 10 جامعات في الرياض
                    </h2>
                </div>
                <!-- End Title -->

                <!-- Grid -->
                <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-5 gap-3 lg:gap-6">
                    <div class="p-4 h-32 md:p-7 bg-gray-100 rounded-lg dark:bg-slate-800">
                        <img class="py-3 lg:py-5 w-16 h-auto md:w-20 lg:w-24 mx-auto"
                            src="./assets/graphics/unv_logos/الجامعة العربية المفتوحة.png" alt="">
                    </div>
                    <div class="p-4 md:p-7 bg-gray-100 rounded-lg dark:bg-slate-800">
                        <img src="./assets/graphics/unv_logos/جامعة الأميرة نورة بنت عبدالرحمن.jpg" alt="">
                    </div>
                    <div class="p-4 md:p-7 bg-gray-100 rounded-lg dark:bg-slate-800">
                        <img src="./assets/graphics/unv_logos/جامعة الإمام محمد بن سعود الإسلامية.png" alt="">
                    </div>
                    <div class="p-4 md:p-7 bg-gray-100 rounded-lg dark:bg-slate-800">
                        <img src="./assets/graphics/unv_logos/جامعة الامير سلطان.svg" alt="">
                    </div>
                    <div class="p-4 md:p-7 bg-gray-100 rounded-lg dark:bg-slate-800">
                        <img src="./assets/graphics/unv_logos/جامعة الفيصل.jpg" alt="">
                    </div>
                    <div class="p-4 md:p-7 bg-gray-100 rounded-lg dark:bg-slate-800">
                        <img src="./assets/graphics/unv_logos/جامعة الملك سعود بن عبد العزيز للعلوم الصحية.svg"
                            alt="">
                    </div>
                    <div class="p-4 md:p-7 bg-gray-100 rounded-lg dark:bg-slate-800">
                        <img src="./assets/graphics/unv_logos/جامعة اليمامة.svg" alt="">
                    </div>
                    <div class="p-4 md:p-7 bg-gray-100 rounded-lg dark:bg-slate-800">
                        <img src="./assets/graphics/unv_logos/جامعة دار العلوم.png" alt="">
                    </div>
                    <div class="p-4 md:p-7 bg-gray-100 rounded-lg dark:bg-slate-800">
                        <img src="./assets/graphics/unv_logos/جامعة رياض العلم.png" alt="">
                    </div>
                    <div class="p-4 md:p-7 bg-gray-100 rounded-lg dark:bg-slate-800">
                        <img src="./assets/graphics/unv_logos/كليات الرؤية.svg" alt="">
                    </div>

                </div>
                <!-- End Grid -->
            </div>
            <!-- End Clients -->

        </div>

    </div>
@endsection
