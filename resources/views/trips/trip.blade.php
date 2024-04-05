@extends('layouts.master')
@section('content')
    <div class=" bg-white">
        <div class="p-6  max-w-5xl mx-auto mt-8 ">
            {{-- //////////// Trip Details//////////// --}}
            <div class="flex gap-10 md:flex-row flex-col">
                <div class="lg:w-full md:w-1/3 w-full">
                    <img src="{{ asset('storage/' . $trip->bus->image) }}" alt="trip bus"
                        class=" w-full h-full rounded-xl object-cover object-top" />
                </div>
                <div>
                    <div class="flex flex-wrap items-start gap-2">
                        <div>
                            <p class="text-3xl">
                                <span class="font-sec">رحلة الى: </span>
                                <span class="font-pr">{{ $trip->university->name }}</span>
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
                                @if (isset($trip->first_going_time))
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
            {{-- ///////////////////////////////////////////////////////////////// --}}
            <div>
                <!-- Main modal -->
                <div id="default-modal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-black/70">
                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
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
                                        <div>
                                            <div class="flex items-center">
                                                <input type="checkbox" id="choose-me" class="hidden peer" />
                                                <label for="choose-me"
                                                    class="select-none cursor-pointer flex items-center justify-center rounded-lg border-2 border-gray-200
            py-3 px-6 font-bold text-gray-700 transition-colors duration-200 ease-in-out peer-checked:bg-gray-200 peer-checked:text-gray-900 peer-checked:border-gray-200">
                                                    <span>Check me</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on
                                    May 25 and is meant to ensure a common set of data rights in the European Union. It
                                    requires organizations to notify users as soon as possible of high-risk data breaches
                                    that could personally affect them.
                                </p>
                            </div>
                            <!-- Modal footer -->
                            <div
                                class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button data-modal-hide="default-modal" type="button"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                                    accept</button>
                                <button data-modal-hide="default-modal" type="button"
                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            {{-- //////////// Trip Reviews //////////// --}}
            <div class="mt-16 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] p-6">
                <h3 class="text-lg font-bold text-[#333]">Reviews(10)</h3>
                <div class="grid md:grid-cols-2 gap-12 mt-6">
                    <div>
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <p class="text-sm text-[#333] font-bold">5.0</p>
                                <svg class="w-5 fill-[#333] ml-1" viewBox="0 0 14 13" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                                </svg>
                                <div class="bg-gray-400 rounded w-full h-2 ml-3">
                                    <div class="w-2/3 h-full rounded bg-[#333]"></div>
                                </div>
                                <p class="text-sm text-[#333] font-bold ml-3">66%</p>
                            </div>
                            <div class="flex items-center">
                                <p class="text-sm text-[#333] font-bold">4.0</p>
                                <svg class="w-5 fill-[#333] ml-1" viewBox="0 0 14 13" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                                </svg>
                                <div class="bg-gray-400 rounded w-full h-2 ml-3">
                                    <div class="w-1/3 h-full rounded bg-[#333]"></div>
                                </div>
                                <p class="text-sm text-[#333] font-bold ml-3">33%</p>
                            </div>
                            <div class="flex items-center">
                                <p class="text-sm text-[#333] font-bold">3.0</p>
                                <svg class="w-5 fill-[#333] ml-1" viewBox="0 0 14 13" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                                </svg>
                                <div class="bg-gray-400 rounded w-full h-2 ml-3">
                                    <div class="w-1/6 h-full rounded bg-[#333]"></div>
                                </div>
                                <p class="text-sm text-[#333] font-bold ml-3">16%</p>
                            </div>
                            <div class="flex items-center">
                                <p class="text-sm text-[#333] font-bold">2.0</p>
                                <svg class="w-5 fill-[#333] ml-1" viewBox="0 0 14 13" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                                </svg>
                                <div class="bg-gray-400 rounded w-full h-2 ml-3">
                                    <div class="w-1/12 h-full rounded bg-[#333]"></div>
                                </div>
                                <p class="text-sm text-[#333] font-bold ml-3">8%</p>
                            </div>
                            <div class="flex items-center">
                                <p class="text-sm text-[#333] font-bold">1.0</p>
                                <svg class="w-5 fill-[#333] ml-1" viewBox="0 0 14 13" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                                </svg>
                                <div class="bg-gray-400 rounded w-full h-2 ml-3">
                                    <div class="w-[6%] h-full rounded bg-[#333]"></div>
                                </div>
                                <p class="text-sm text-[#333] font-bold ml-3">6%</p>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="flex items-start">
                            <img src="https://readymadeui.com/team-2.webp"
                                class="w-12 h-12 rounded-full border-2 border-white" />
                            <div class="ml-3">
                                <h4 class="text-sm font-bold text-[#333]">John Doe</h4>
                                <div class="flex space-x-1 mt-1">
                                    <svg class="w-4 fill-[#333]" viewBox="0 0 14 13" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                                    </svg>
                                    <svg class="w-4 fill-[#333]" viewBox="0 0 14 13" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                                    </svg>
                                    <svg class="w-4 fill-[#333]" viewBox="0 0 14 13" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                                    </svg>
                                    <svg class="w-4 fill-[#CED5D8]" viewBox="0 0 14 13" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                                    </svg>
                                    <svg class="w-4 fill-[#CED5D8]" viewBox="0 0 14 13" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                                    </svg>
                                    <p class="text-xs !ml-2 font-semibold text-[#333]">2 mins ago</p>
                                </div>
                                <p class="text-sm mt-4 text-[#333]">Lorem ipsum dolor sit amet, consectetur adipisci elit,
                                    sed eiusmod tempor incidunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                        <button type="button"
                            class="w-full mt-10 px-4 py-2.5 bg-transparent hover:bg-gray-50 border border-[#333] text-[#333] font-bold rounded">Read
                            all reviews</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
