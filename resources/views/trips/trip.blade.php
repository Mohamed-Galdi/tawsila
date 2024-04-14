@extends('layouts.master')
@section('content')
    <div class=" bg-white">
        <div class="p-6  max-w-5xl mx-auto mt-8 ">
            {{-- //////////// Trip Details//////////// --}}
            <div class="flex gap-10 md:flex-row flex-col">
                <div class="md:w-1/2 w-full">
                    <img src="{{ asset('storage/' . $trip->bus->image) }}" alt="trip bus"
                        class=" w-full h-full rounded-xl object-cover object-top" />
                </div>
                <div class="md:w-1/2 w-full">
                    <div class="flex flex-wrap items-start gap-2">
                        <div>
                            <p class="text-3xl">
                                <span class="font-sec">رحلة الى: </span>
                                <span class="font-pr">{{ $trip->university->name }}</span>
                                <span class="text-base font-sec">( {{ $trip->university->address }} )</span>
                            </p>
                        </div>
                    </div>
                    <hr class="my-3" />
                    <div class="flex flex-wrap gap-4 items-start">
                        <div class="font-sec text-lg">المناطق : </div>

                        <div class="flex gap-2 flex-wrap">
                            @foreach ($trip->areas as $area)
                                <div
                                    class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-md font-medium bg-gray-700 hover:bg-gray-900 hover:cursor-pointer text-white">
                                    {{ $area->name }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <hr class="my-2" />
                    <div>
                        <p class="font-sec text-lg ">السائق :</p>
                        <div class="mt-4 flex gap-4 ">
                            <img src="{{ asset('storage/' . $trip->driver->user->image) }}" class="w-16 h-16 rounded-full "
                                alt="trip driver">
                            <div>
                                <p class="font-pr text-xl ">{{ $trip->driver->user->name }}</p>
                                <p> 5 سنوات خبرة</p>
                            </div>

                        </div>


                    </div>
                    <hr class="my-3 text-pr" />
                    <div>
                        <p class="font-sec text-lg ">تواقيت الرحلة :</p>
                        <div class="flex mx-0 lg:mx-2 items-center">
                            <p class="font-pr text-base lg:text-lg text-nowrap">
                                {{ $trip->times_per_day == 1 ? 'مرة في اليوم' : 'مرتان في اليوم' }}:
                            </p>
                            <div class="flex ms-4 font-sec text-center font-bold text-sm lg:text-base ">
                                @if (isset($trip->first_going_time))
                                    <div class="flex flex-col m-2 bg-blue-700 text-white px-3 py-1 rounded-lg">
                                        <p>ذهاب</p>
                                        <p>{{ $trip->first_going_time }}</p>
                                    </div>
                                @endif
                                @if (isset($trip->first_return_time))
                                    <div class="flex flex-col m-2 bg-blue-700 text-white px-3 py-1 rounded-lg">
                                        <p>إياب</p>
                                        <p>{{ $trip->first_return_time }}</p>
                                    </div>
                                @endif
                                @if (isset($trip->second_going_time))
                                    <div class="w-1 rounded-md bg-pr"></div>
                                @endif
                                @if (isset($trip->second_going_time))
                                    <div class="flex flex-col m-2 bg-blue-700 text-white px-3 py-1 rounded-lg">
                                        <p>ذهاب</p>
                                        <p>{{ $trip->second_going_time }}</p>
                                    </div>
                                @endif
                                @if (isset($trip->second_return_time))
                                    <div class="flex flex-col m-2 bg-blue-700 text-white px-3 py-1 rounded-lg">
                                        <p>إياب</p>
                                        <p>{{ $trip->second_return_time }}</p>
                                    </div>
                                @endif
                            </div>


                        </div>
                    </div>
                    <hr class="my-3" />
                    <div class="h-fit relative mt-16">
                        <a class=" ">
                            <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                                class="overflow-hidden w-full p-2 h-12 bg-black text-white border-none  text-xl font-bold cursor-pointer relatidve z-10 group absolute bottom-0">
                                إحجز الان
                                <span
                                    class="absolute w-full h-40 top-[0rem] left-[0.45rem] -rotate-12 bg-white  transform scale-x-0 group-hover:scale-x-300 transition-transform group-hover:duration-500 duration-1000 origin-left"></span>
                                <span
                                    class="absolute w-full h-40 top-[0rem] left-[0.45rem] -rotate-12 bg-tawsila-200  transform scale-x-0 group-hover:scale-x-100 transition-transform group-hover:duration-700 duration-700 origin-left"></span>
                                <span
                                    class="absolute w-full h-40 top-[0rem] left-[0.45rem] -rotate-12 bg-pr  transform scale-x-0 group-hover:scale-x-100 transition-transform group-hover:duration-1000 duration-500 origin-left"></span>
                                <span
                                    class="group-hover:opacity-100 group-hover:duration-1000 duration-100 opacity-0 absolute top-2.5 right-6 z-10 text-soft_black">إحجز
                                    الان</span>
                            </button>
                        </a>
                    </div>
                </div>
                <a href="/trips" class="hidden md:flex bg-soft_black text-white p-2 rounded-xl h-fit font-pr gap-2">
                    <p>عودة</p>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="#fff" class="w-4">
                        <path
                            d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160zm352-160l-160 160c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L301.3 256 438.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0z" />
                    </svg>
                </a>
            </div>
            {{-- ///////// the Modal//////// --}}
            <div>
                <!-- Main modal -->
                <div id="default-modal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-black/70">
                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <form id="subscriptionForm" method="post" action="{{ route('subscriptions.store') }}"
                            class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            @csrf
                            <input type="hidden" value="{{ $trip->id }}" name="trip">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white font-pr">
                                    تأكيد الحجز
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="default-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5 space-y-4">

                                <div>
                                    <div
                                        class="w-full h-fit p-2 rounded-lg shadow flex flex-col items-center justify-center gap-2 bg-slate-50">
                                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400 font-sec">
                                            المرجوا إختيار مدة الحجز.
                                        </p>


                                        <ul class="flex w-full gap-6 justify-center items-center my-4">
                                            <li>
                                                <input type="radio" id="3m" name="plan" value="3m" checked
                                                    class="hidden peer" required />
                                                <label for="3m"
                                                    class="inline-flex font-sec  text-white  bg-soft_black w-full h-full  px-3 py-2 rounded-lg  hover:shadow-2xl hover:bg-gray-700 hover:cursor-pointer peer-checked:bg-pr peer-checked:text-soft_black">
                                                    <div class="block">
                                                        <div class="w-full text-lg font-semibold">3 أشهر</div>
                                                    </div>
                                                </label>
                                            </li>
                                            <li>
                                                <input type="radio" id="6m" name="plan" value="6m"
                                                    class="hidden peer" required />
                                                <label for="6m"
                                                    class="inline-flex font-sec  text-white  bg-soft_black w-full h-full  px-3 py-2 rounded-lg  hover:shadow-2xl hover:bg-gray-700 hover:cursor-pointer peer-checked:bg-pr peer-checked:text-soft_black">
                                                    <div class="block">
                                                        <div class="w-full text-lg font-semibold">6 أشهر</div>
                                                    </div>
                                                </label>
                                            </li>
                                            <li>
                                                <input type="radio" id="9m" name="plan" value="9m"
                                                    class="hidden peer" required />
                                                <label for="9m"
                                                    class="inline-flex font-sec  text-white  bg-soft_black w-full h-full  px-3 py-2 rounded-lg  hover:shadow-2xl hover:bg-gray-700 hover:cursor-pointer peer-checked:bg-pr peer-checked:text-soft_black">
                                                    <div class="block">
                                                        <div class="w-full text-lg font-semibold">9 أشهر</div>
                                                    </div>
                                                </label>
                                            </li>
                                            <li>
                                                <input type="radio" id="12m" name="plan" value="12m"
                                                    class="hidden peer" required />
                                                <label for="12m"
                                                    class="inline-flex font-sec  text-white  bg-soft_black w-full h-full  px-3 py-2 rounded-lg  hover:shadow-2xl hover:bg-gray-700 hover:cursor-pointer peer-checked:bg-pr peer-checked:text-soft_black">
                                                    <div class="block">
                                                        <div class="w-full text-lg font-semibold">12 أشهر</div>
                                                    </div>
                                                </label>
                                            </li>

                                        </ul>

                                    </div>


                                </div>
                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    بعد تأكيد الحجز يمكنك الدخول لحسابك و تنزيل نسخة من وصل الحجز.
                                </p>
                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    هذا الإشتراك يصبح ساري المفعول فور القيام بالإشتراك.
                                </p>
                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    لتغيير خطة الإشتراك او للمزيد من المعلومات يمكنك تصفح حسابك او التواصل مع الدعم.
                                </p>
                            </div>
                            <!-- Modal footer -->
                            <div
                                class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button id="buttonText" type="submit"
                                    class="relative py-2 px-6 me-3 text-pr text-base font-bold nded-full overflow-hidden bg-soft_black rounded-lg transition-all duration-400 ease-in-out shadow-md hover:scale-105 hover:text-soft_black hover:shadow-lg active:scale-90 before:absolute before:top-0 before:-left-full before:w-full before:h-full before:bg-gradient-to-r before:from-tawsila-300 before:to-pr before:transition-all before:duration-500 before:ease-in-out before:z-[-1] before:rounded-lg hover:before:left-0">
                                    <span id="buttonText">تأكيد</span>
                                    {{-- <span  class="hidden animate-spin">Loading...</span> --}}
                                </button>
                                <span id="spinner" class="loader hidden animate-spin"></span>
                                <button data-modal-hide="default-modal" type="button"
                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-soft_black focus:z-10 focus:ring-4 focus:ring-gray-100 ">إلغاء</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            {{-- //////////// Trip Reviews //////////// --}}
            <div class="mt-16 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] p-6">
                <h3 class="text-lg font-bold text-[#333]">التقييمات({{ $trip->ratings->count() }})</h3>
                @forelse ($trip->ratings as $rate)
                    <div class="bg-gray-100 shadow-lg rounded-lg px-6 py-2 w-full mt-8 flex gap-4">
                        <div class="flex flex-col justify-start items-center">
                            <img src="{{ asset('storage/' . $rate->student->user->image) }}"
                                class="w-12 h-12 rounded-full " />
                            <p class="font-pr">{{ $rate->student->user->name }}</p>
                        </div>
                        <div class="w-1 bg-pr rounded-md">
                        </div>
                        <div>
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $rate->rate)
                                    <span class="text-yellow-500 text-3xl">★</span>
                                @else
                                    <span class="text-gray-500 text-xl">★</span>
                                @endif
                            @endfor
                            <p class="mt-2 font-sec text-lg">{{ $rate->description }}</p>
                        </div>
                    </div>
                @empty
                    <p class="mt-2 font-sec text-lg">لا يوجد تقييمات حتى الآن لهذه الرحلة </p>
                @endforelse

            </div>
        </div>
        <script>
            document.getElementById('subscriptionForm').addEventListener('submit', function() {
                // Show spinner and hide text
                document.getElementById('spinner').classList.remove('hidden');
                document.getElementById('buttonText').classList.add('hidden');
            });
        </script>
    </div>
@endsection
