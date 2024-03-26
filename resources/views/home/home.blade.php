@extends('layouts.master')
@section('content')
    {{-- //////////////////////// Header ///////////////////// --}}
    <div class="bg-pr hidden lg:block ">
        <div class="h-[90vh] max-h-[700px] bg-pr flex mx-auto max-w-screen-xl ">
            {{-- Left Side --}}
            <div class="bg-greeen-500 w-1/2 flex flex-col justify-center items-center gap-2 mr-8 xl:mr-0">
                <h1 class="fade text-soft_black font-pr xl:text-7xl text-5xl text-center p-4 ">
                    {{ $content->title }}
                </h1>
                <h2 class="fade1 text-center font-sec xl:text-3xl text-xl font-normal">{{ $content->subtitle }} </h2>
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
    {{-- //////////////////////// Mobile Header ///////////////////// --}}
    <div class="bg-pr blosck lg:hidden flex  ">
        <div class="h-[90vh] max-h-[700px] bg-pr flex mx-auto max-w-screen-xl  ">
            {{-- Left Side --}}
            <div class="w-full flex flex-col justify-center items-center gap-2  xl:mr-0">

                <h1 class="fade w-4/5 text-soft_black font-pr  md:text-5xl text-4xl text-center p-4 ">{{ $content->title }}
                </h1>
                <h2 class="fade1 w-4/5 text-center font-sec md:text-2xl text-xl ">{{ $content->subtitle }} </h2>
                <div class="bg-reed-500 w-1/2  flex justify-center">
                    <img class="bus w-[300px] drop-shadow-md" src="./assets/graphics/images/the_bus.png" alt="">
                </div>
                <div class="fade2 flex flex-col justify-center gap-2 w-4/5">
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

        </div>
    </div>
    {{-- //////////////////////// Our Universities ///////////////////// --}}
    <div class="bg-soft_black">
        <div class="mx-auto max-w-screen-xl">
            <!-- Clients -->
            <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
                <!-- Title -->
                <div class=" mx-auto text-center mb-6 md:mb-12">
                    <h2 class="font-sec  text-xl font-semibold md:text-4xl md:leading-tight text-gray-200">
                        {{ $content->our_university_title }} </h2>
                </div>
                <!-- End Title -->

                <!-- Grid -->
                <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-5 gap-3 lg:gap-6">
                    <div class="p-4  bg-gray-100 rounded-lg">
                        <img class="h-16 mx-auto " src="./assets/graphics/unv_logos/الجامعة العربية المفتوحة.png"
                            alt="">
                    </div>
                    <div class="p-4  bg-gray-100 rounded-lg">
                        <img class="h-16 mx-auto " src="./assets/graphics/unv_logos/جامعة الأميرة نورة بنت عبدالرحمن.png"
                            alt="">
                    </div>
                    <div class="p-4  bg-gray-100 rounded-lg">
                        <img class="h-16 mx-auto " src="./assets/graphics/unv_logos/جامعة الملك سعود.png" alt="">
                    </div>
                    <div class="p-4  bg-gray-100 rounded-lg">
                        <img class="h-16 mx-auto " src="./assets/graphics/unv_logos/جامعة الامير سلطان.png" alt="">
                    </div>
                    <div class="p-4  bg-gray-100 rounded-lg">
                        <img class="h-16 mx-auto " src="./assets/graphics/unv_logos/جامعة الفيصل.png" alt="">
                    </div>
                    <div class="p-4  bg-gray-100 rounded-lg">
                        <img class="h-16 mx-auto "
                            src="./assets/graphics/unv_logos/جامعة الملك سعود بن عبد العزيز للعلوم الصحية.png"
                            alt="">
                    </div>
                    <div class="p-4  bg-gray-100 rounded-lg">
                        <img class="h-16 mx-auto " src="./assets/graphics/unv_logos/جامعة المعرفة.png" alt="">
                    </div>
                    <div class="p-4  bg-gray-100 rounded-lg">
                        <img class="h-16 mx-auto " src="./assets/graphics/unv_logos/جامعة دار العلوم.png" alt="">
                    </div>
                    <div class="p-4  bg-gray-100 rounded-lg">
                        <img class="h-16 mx-auto " src="./assets/graphics/unv_logos/جامعة رياض العلم.png" alt="">
                    </div>
                    <div class="p-4  bg-gray-100 rounded-lg">
                        <img class="h-16 mx-auto " src="./assets/graphics/unv_logos/كليات الرؤية.png" alt="">
                    </div>

                </div>
                <!-- End Grid -->
            </div>
            <!-- End Clients -->
        </div>
    </div>
    {{-- //////////////////////// Our Features ///////////////////// --}}
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto" dir="ltr">
        <div class="relative p-6 md:p-16">
            <!-- Grid -->
            <div class="relative z-10 lg:grid lg:grid-cols-12 lg:gap-16 lg:items-center ">
                <div class="mb-10 lg:mb-0 lg:col-span-6 lg:col-start-8 lg:order-2" dir="rtl">
                    <h2 class="text-3xl text-gray-800 font-bold sm:text-4xl font-sec">
                        {{ $content->our_services }}</h2>

                    <!-- Tab Navs -->
                    <nav class="grid gap-4 mt-5 md:mt-10" aria-label="Tabs" role="tablist">
                        <button type="button"
                            class="bg-white shadow-lg hs-tab-active:bg-white hs-tab-active:shadow-md hs-tab-active:hover:border-transparent text-start  p-4 md:p-5 rounded-xl  active"
                            id="tabs-with-card-item-1" data-hs-tab="#tabs-with-card-1" aria-controls="tabs-with-card-1"
                            role="tab">
                            <span class="flex">
                                <svg class="flex-shrink-0 mt-2 size-6 md:size-7 hs-tab-active:text-blue-600 text-gray-800 "
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                    <path
                                        d="M288 0H400c8.8 0 16 7.2 16 16V80c0 8.8-7.2 16-16 16H320.7l89.6 64H512c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H336V400c0-26.5-21.5-48-48-48s-48 21.5-48 48V512H64c-35.3 0-64-28.7-64-64V224c0-35.3 28.7-64 64-64H165.7L256 95.5V32c0-17.7 14.3-32 32-32zm48 240a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM80 224c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V240c0-8.8-7.2-16-16-16H80zm368 16v64c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V240c0-8.8-7.2-16-16-16H464c-8.8 0-16 7.2-16 16zM80 352c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V368c0-8.8-7.2-16-16-16H80zm384 0c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V368c0-8.8-7.2-16-16-16H464z" />
                                </svg>
                                <span class="grow ms-6">
                                    <span
                                        class="block text-lg hs-tab-active:text-blue-600 text-gray-800  font-pr">{{ $content['1st_service_title'] }}</span>
                                    <span
                                        class="block text-xl mt-1 text-gray-800   font-sec">{{ $content['1st_service_text'] }}</span>
                                </span>
                            </span>
                        </button>

                        <button type="button"
                            class="hs-tab-active:bg-white hs-tab-active:shadow-md hs-tab-active:hover:border-transparent text-start p-4 md:p-5 rounded-xl "
                            id="tabs-with-card-item-2" data-hs-tab="#tabs-with-card-2" aria-controls="tabs-with-card-2"
                            role="tab">
                            <span class="flex">
                                <svg class="flex-shrink-0 mt-2 size-6 md:size-7 hs-tab-active:text-blue-600 text-gray-800 "
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path
                                        d="M4.1 38.2C1.4 34.2 0 29.4 0 24.6C0 11 11 0 24.6 0H133.9c11.2 0 21.7 5.9 27.4 15.5l68.5 114.1c-48.2 6.1-91.3 28.6-123.4 61.9L4.1 38.2zm503.7 0L405.6 191.5c-32.1-33.3-75.2-55.8-123.4-61.9L350.7 15.5C356.5 5.9 366.9 0 378.1 0H487.4C501 0 512 11 512 24.6c0 4.8-1.4 9.6-4.1 13.6zM80 336a176 176 0 1 1 352 0A176 176 0 1 1 80 336zm184.4-94.9c-3.4-7-13.3-7-16.8 0l-22.4 45.4c-1.4 2.8-4 4.7-7 5.1L168 298.9c-7.7 1.1-10.7 10.5-5.2 16l36.3 35.4c2.2 2.2 3.2 5.2 2.7 8.3l-8.6 49.9c-1.3 7.6 6.7 13.5 13.6 9.9l44.8-23.6c2.7-1.4 6-1.4 8.7 0l44.8 23.6c6.9 3.6 14.9-2.2 13.6-9.9l-8.6-49.9c-.5-3 .5-6.1 2.7-8.3l36.3-35.4c5.6-5.4 2.5-14.8-5.2-16l-50.1-7.3c-3-.4-5.7-2.4-7-5.1l-22.4-45.4z" />
                                </svg>
                                <span class="grow ms-6">
                                    <span
                                        class="block text-lg font-pr hs-tab-active:text-blue-600 text-gray-800 ">{{ $content['2nd_service_title'] }}
                                    </span>
                                    <span
                                        class="block text-xl font-sec mt-1 text-gray-800  ">{{ $content['2nd_service_text'] }}</span>
                                </span>
                            </span>
                        </button>

                        <button type="button"
                            class="hs-tab-active:bg-white hs-tab-active:shadow-md hs-tab-active:hover:border-transparent text-start p-4 md:p-5 rounded-xl "
                            id="tabs-with-card-item-3" data-hs-tab="#tabs-with-card-3" aria-controls="tabs-with-card-3"
                            role="tab">
                            <span class="flex">
                                <svg class="flex-shrink-0 mt-2 size-6 md:size-7 hs-tab-active:text-blue-600 text-gray-800 "
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path
                                        d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z" />
                                    <path d="M5 3v4" />
                                    <path d="M19 17v4" />
                                    <path d="M3 5h4" />
                                    <path d="M17 19h4" />
                                </svg>
                                <span class="grow ms-6">
                                    <span
                                        class="block text-lg font-pr hs-tab-active:text-blue-600 text-gray-800 ">{{ $content['3rd_service_title'] }}
                                    </span>
                                    <span
                                        class="block font-sec text-xl mt-1 text-gray-800  ">{{ $content['3rd_service_text'] }}</span>
                                </span>
                            </span>
                        </button>
                    </nav>
                    <!-- End Tab Navs -->
                </div>
                <!-- End Col -->

                <div class="lg:col-span-6">
                    <div class="relative">
                        <!-- Tab Content -->
                        <div>
                            <div id="tabs-with-card-1" role="tabpanel" aria-labelledby="tabs-with-card-item-1">
                                <img loading="lazy" class="shadow-xl shadow-gray-200 rounded-xl  max-h-[600px] w-full"
                                    src="./assets/graphics/services_img/universities.jpg" alt="Image Description">
                            </div>

                            <div id="tabs-with-card-2" class="hidden" role="tabpanel"
                                aria-labelledby="tabs-with-card-item-2">
                                <img loading="lazy"
                                    class="object-cover shadow-xl shadow-gray-200 rounded-xl  max-h-[600px] w-full"
                                    src="./assets/graphics/services_img/drivers.jpg" alt="Image Description">
                            </div>

                            <div id="tabs-with-card-3" class="hidden" role="tabpanel"
                                aria-labelledby="tabs-with-card-item-3">
                                <img loading="lazy"
                                    class="object-cover shadow-xl shadow-gray-200 rounded-xl  max-h-[600px] w-full"
                                    src="./assets/graphics/services_img/buses.jpg" alt="Image Description">
                            </div>
                        </div>
                        <!-- End Tab Content -->
                    </div>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Grid -->

            <!-- Background Color -->
            <div class="absolute inset-0 grid grid-cols-12 size-full">
                <div class="col-span-full lg:col-span-7 lg:col-start-6 bg-pr w-full h-5/6 rounded-xl sm:h-3/4 lg:h-full ">
                </div>
            </div>
            <!-- End Background Color -->
        </div>
    </div>
    <!-- End Features -->

    {{-- //////////////////////// Strat Steps ///////////////////// --}}
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div
            class="py-3 flex items-center before:flex-[1_1_0%] before:border-t-4 before:border-pr before:me-6 after:flex-[1_1_0%]  after:border-t-4 after:border-pr after:ms-6   mb-16">
            <h2 class="font-pr text-center text-5xl">{{ $content->steps }}</h2>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 items-center gap-12">
            <!-- Icon Block -->
            <div>
                <div class="bg-pr text-soft_black font-pr text-2xl rounded-lg text-center w-12 h-12 p-2">1</div>
                <h3 class="text-lg font-semibold text-gray-800  mt-6">{{ $content['1st_step_title'] }}
                </h3>
                <div class="bg-gray-300  h-1 mt-3">
                    <div class="bg-pr w-[25%] h-1"></div>
                </div>
                <p class="mt-1 text-gray-600 ">{{ $content['1st_step_text'] }}
                </p>
            </div>
            <!-- End Icon Block -->
            <!-- Icon Block -->
            <div>
                <div class="bg-pr text-soft_black font-pr text-2xl rounded-lg text-center w-12 h-12 p-2">2</div>
                <h3 class="text-lg font-semibold text-gray-800  mt-6">{{ $content['2nd_step_title'] }}
                </h3>
                <div class="bg-gray-300  h-1 mt-3">
                    <div class="bg-pr w-[50%] h-1"></div>
                </div>
                <p class="mt-1 text-gray-600 ">{{ $content['2nd_step_text'] }}</p>
            </div>
            <!-- End Icon Block -->
            <!-- Icon Block -->
            <div>
                <div class="bg-pr text-soft_black font-pr text-2xl rounded-lg text-center w-12 h-12 p-2">3</div>
                <h3 class="text-lg font-semibold text-gray-800  mt-6">{{ $content['3rd_step_title'] }}
                </h3>
                <div class="bg-gray-300  h-1 mt-3">
                    <div class="bg-pr w-[75%] h-1"></div>
                </div>
                <p class="mt-1 text-gray-600 ">{{ $content['3rd_step_text'] }}</p>
            </div>
            <!-- End Icon Block -->
            <!-- Icon Block -->
            <div>
                <div class="bg-pr text-soft_black font-pr text-2xl rounded-lg text-center w-12 h-12 p-2">4</div>
                <h3 class="text-lg font-semibold text-gray-800  mt-6">{{ $content['4th_step_title'] }}</h3>
                <div class="bg-gray-300  h-1 mt-3">
                    <div class="bg-pr w-full h-1"></div>
                </div>
                <p class="mt-1 text-gray-600 ">{{ $content['4th_step_text'] }}</p>
            </div>
            <!-- End Icon Block -->


        </div>
    </div>
    <!-- End Steps -->
    {{-- //////////////////////// Our Drivers ///////////////////// --}}
    <div class="mx-auto max-w-screen-xl">
        <!-- Team -->
        <div class="max-w-5xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <!-- Title -->
            <div class="relative max-w-2xl mx-auto text-center mb-10 lg:mb-14">
                <h2 class="text-2xl font-bold md:text-4xl md:leading-tight  font-pr">{{ $content->drivers }}
                </h2>
                <span
                    class="absolute -bottom-1 left-0 w-full h-1 bg-gradient-to-r from-tawsila-600 via-orange-400 to-pr rounded-full"></span>
            </div>
            <!-- End Title -->

            <!-- Grid -->
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-8 md:gap-12">
                <div class="text-center">
                    <img loading="lazy" class="rounded-full size-24 mx-auto"
                        src="./assets/graphics/homeDrivers-images/driver_6.jpg" alt="Image Description">
                    <div class="mt-2 sm:mt-4">
                        <h3 class=" text-gray-800  font-sec font-bold text-2xl">
                            {{ $content['driver_1_name'] }}
                        </h3>
                        <p class="text-gray-400 font-pr text-lg">
                            {{ $content['driver_1_exp'] }} </p>
                    </div>
                </div>
                <!-- End Col -->
                <div class="text-center">
                    <img loading="lazy" class="rounded-full size-24 mx-auto"
                        src="./assets/graphics/homeDrivers-images/driver_5.jpg" alt="Image Description">
                    <div class="mt-2 sm:mt-4">
                        <h3 class=" text-gray-800  font-sec font-bold text-2xl">
                            {{ $content['driver_2_name'] }}
                        </h3>
                        <p class="text-gray-400 font-pr text-lg">
                            {{ $content['driver_2_exp'] }}
                        </p>
                    </div>
                </div>
                <!-- End Col -->
                <div class="text-center">
                    <img loading="lazy" class="rounded-full size-24 mx-auto"
                        src="./assets/graphics/homeDrivers-images/driver_3.jpg" alt="Image Description">
                    <div class="mt-2 sm:mt-4">
                        <h3 class=" text-gray-800  font-sec font-bold text-2xl">
                            {{ $content['driver_3_name'] }}
                        </h3>
                        <p class="text-gray-400 font-pr text-lg">
                            {{ $content['driver_3_exp'] }}
                        </p>
                    </div>
                </div>
                <!-- End Col -->
                <div class="text-center">
                    <img loading="lazy" class="rounded-full size-24 mx-auto"
                        src="./assets/graphics/homeDrivers-images/driver_2.jpg" alt="Image Description">
                    <div class="mt-2 sm:mt-4">
                        <h3 class=" text-gray-800  font-sec font-bold text-2xl">
                            {{ $content['driver_4_name'] }}
                        </h3>
                        <p class="text-gray-400 font-pr text-lg">
                            {{ $content['driver_4_exp'] }}
                        </p>
                    </div>
                </div>
                <!-- End Col -->
                <div class="text-center">
                    <img loading="lazy" class="rounded-full size-24 mx-auto"
                        src="./assets/graphics/homeDrivers-images/driver_1.jpg" alt="Image Description">
                    <div class="mt-2 sm:mt-4">
                        <h3 class=" text-gray-800  font-sec font-bold text-2xl">
                            {{ $content['driver_5_name'] }}
                        </h3>
                        <p class="text-gray-400 font-pr text-lg">
                            {{ $content['driver_5_exp'] }}
                        </p>
                    </div>
                </div>
                <!-- End Col -->
                <div class="text-center">
                    <img loading="lazy" class="rounded-full size-24 mx-auto"
                        src="./assets/graphics/homeDrivers-images/driver_14.jpg" alt="Image Description">
                    <div class="mt-2 sm:mt-4">
                        <h3 class=" text-gray-800  font-sec font-bold text-2xl">
                            {{ $content['driver_6_name'] }}
                        </h3>
                        <p class="text-gray-400 font-pr text-lg">
                            {{ $content['driver_6_exp'] }}
                        </p>
                    </div>
                </div>
                <!-- End Col -->
                <div class="text-center">
                    <img loading="lazy" class="rounded-full size-24 mx-auto"
                        src="./assets/graphics/homeDrivers-images/driver_7.jpg" alt="Image Description">
                    <div class="mt-2 sm:mt-4">
                        <h3 class=" text-gray-800  font-sec font-bold text-2xl">
                            {{ $content['driver_7_name'] }}
                        </h3>
                        <p class="text-gray-400 font-pr text-lg">
                            {{ $content['driver_7_exp'] }}
                        </p>
                    </div>
                </div>
                <!-- End Col -->
                <div class="text-center">
                    <img loading="lazy" class="rounded-full size-24 mx-auto"
                        src="./assets/graphics/homeDrivers-images/driver_8.jpg" alt="Image Description">
                    <div class="mt-2 sm:mt-4">
                        <h3 class=" text-gray-800  font-sec font-bold text-2xl">
                            {{ $content['driver_8_name'] }}
                        </h3>
                        <p class="text-gray-400 font-pr text-lg">
                            {{ $content['driver_8_exp'] }}
                        </p>
                    </div>
                </div>
                <!-- End Col -->
                <div class="text-center">
                    <img loading="lazy" class="rounded-full size-24 mx-auto"
                        src="./assets/graphics/homeDrivers-images/driver_11.jpg" alt="Image Description">
                    <div class="mt-2 sm:mt-4">
                        <h3 class=" text-gray-800  font-sec font-bold text-2xl">
                            {{ $content['driver_9_name'] }}
                        </h3>
                        <p class="text-gray-400 font-pr text-lg">
                            {{ $content['driver_9_exp'] }}
                        </p>
                    </div>
                </div>
                <!-- End Col -->
                <div class="text-center">
                    <img loading="lazy" class="rounded-full size-24 mx-auto"
                        src="./assets/graphics/homeDrivers-images/driver_15.jpg" alt="Image Description">
                    <div class="mt-2 sm:mt-4">
                        <h3 class=" text-gray-800  font-sec font-bold text-2xl">
                            {{ $content['driver_10_name'] }}
                        </h3>
                        <p class="text-gray-400 font-pr text-lg">
                            {{ $content['driver_10_exp'] }}
                        </p>
                    </div>
                </div>
                <!-- End Col -->


            </div>
            <!-- End Grid -->

            <!-- Card -->
            <div class="mt-12 flex justify-center">
                <div class="border border-gray-200 p-1.5 ps-5 rounded-full">
                    <div class="flex items-center gap-x-3">
                        <span class="text-lg text-gray-800 font-sec">لديك خبرة في السياقة ؟</span>
                        <a class="py-3 font-pr px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-full border border-gray-200 bg-soft_black text-pr shadow-sm hover:bg-gray-700 disabled:opacity-50 disabled:pointer-events-none "
                            href="{{ route('driverRegister') }}">
                            نحن نوضف
                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m9 18 6-6-6-6" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Card -->
        </div>
        <!-- End Team -->

    </div>
    <!-- End Drivers -->

    {{-- //////////////////////// Scripts ///////////////////// --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const tabButtons = document.querySelectorAll("[role='tab']");
            const tabContents = document.querySelectorAll("[role='tabpanel']");

            tabButtons.forEach(button => {
                button.addEventListener("click", () => {
                    const targetTabId = button.getAttribute("aria-controls");

                    // Remove selected class from all tab buttons
                    tabButtons.forEach(btn => {
                        btn.classList.remove("bg-white", "shadow-lg", "hover:bg-white");
                    });

                    // Add selected class to the clicked tab button
                    button.classList.add("bg-white", "shadow-lg", "hover:bg-white");

                    // Hide all tab contents
                    tabContents.forEach(content => {
                        content.classList.add("hidden");
                    });

                    // Show the corresponding tab content
                    const targetTabContent = document.getElementById(targetTabId);
                    if (targetTabContent) {
                        targetTabContent.classList.remove("hidden");
                    }
                });

                // Add hover effect only if the button is not selected
                button.addEventListener("mouseenter", () => {
                    if (!button.classList.contains("bg-white")) {
                        button.classList.add("hover:bg-gray-200");
                    }
                });

                button.addEventListener("mouseleave", () => {
                    if (!button.classList.contains("bg-white")) {
                        button.classList.remove("hover:bg-gray-200");
                    }
                });
            });
        });
    </script>
@endsection
