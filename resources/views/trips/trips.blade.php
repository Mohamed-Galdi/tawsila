@extends('layouts.master')
@section('content')
    <div class="min-h-screen bg-gray-200 py-6">
        <div class="mx-auto max-w-screen-xl ">
            {{-- ///////////////////////////////// Search /////////////////////////////// --}}
            <div class="flex">
                <div class="rounded-xl border  my-8 ">
                    <form action="{{ route('trips.index') }}" method="GET"
                        class="lg:flex gap-8 items-end lg:mx-2 mx-8 w-full">
                        <div class="flex flex-col md:w-96 w-full">
                            <label for="university" class="text-sm font-medium text-stone-600">الجامعة</label>
                            <select id="university" name="universityId"
                                class="mt-2 block w-full rounded-md border border-gray-100 bg-gray-100 px-2 py-2 shadow-sm outline-none focus:border-sahem_pr-500 focus:ring focus:ring-sahem_pr-200 focus:ring-opacity-50">
                                <option value="" @if (old('universityId') == '') selected @endif disabled>إختر
                                </option>
                                @foreach ($universities as $university)
                                    <option value="{{ $university->id }}" @if (old('universityId') == $university->id) selected @endif>
                                        {{ $university->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col md:w-96 w-full">
                            <label for="area" class="text-sm font-medium text-stone-600">الحي</label>
                            <select id="area" name="areaId"
                                class="mt-2 block w-full rounded-md border border-gray-100 bg-gray-100 px-2 py-2 shadow-sm outline-none focus:border-sahem_pr-500 focus:ring focus:ring-sahem_pr-200 focus:ring-opacity-50">
                                <option value="" @if (old('areaId') == '') selected @endif disabled>إختر
                                </option>
                                @foreach ($areas as $area)
                                    <option value="{{ $area->id }}" @if (old('areaId') == $area->id) selected @endif>
                                        {{ $area->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-4 flex justify-between">
                            <button type="submit"
                                class="bg-soft_black text-pr font-pr py-1 px-4 rounded-md w-20 text-lg">بحث</button>
                            <a href="{{ route('trips.index') }}"
                                class="font-pr py-2 mx-8 text-xl underline decoration-pr hover:decoration-red-500 ">مسح
                                الفلتر</a>
                        </div>
                    </form>





                </div>
            </div>
            {{-- ///////////////////////////////// Trips /////////////////////////////// --}}
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1  justify-center items-center gap-12 px-8 lg:px-0   ">
                @forelse ($trips as $trip)
                    <div
                        class="bg-gray-300 h-fit flex flex-col  rounded-xl shadow-lg overflow-hidden hover:cursor-pointer hover:bg-tawsila-600 border-2 border-white hover:border-pr">
                        {{-- ///////////////// Bus image //////////////////// --}}
                        <div class="h-[300px] bg-cover bg-center relative "
                            style="background-image: url(storage/{{ $trip->bus->image }} )">


                            <div
                                class="bg-gray-600  w-fit px-2 m-2 rounded-lg absolute bottom-6 right-2 flex items-center gap-1">
                                @if ($trip->ratings->count() != 0)
                                    <div>
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $trip->ratings->avg('rate'))
                                                <span class="text-yellow-500 text-base">★</span>
                                            @else
                                                <span class="text-gray-200 text-xs">★</span>
                                            @endif
                                        @endfor
                                    </div>
                                @endif
                                <p class="text-white text-xs">({{ $trip->ratings->count() }} تقييمات)</p>
                            </div>

                        </div>
                        {{-- ///////////////// Trip details //////////////////// --}}
                        <div class="h-[300px]  rounded-t-2xl -mt-6 relative backdrop-blur-lg bg-white/20  ">
                            <div class="m-6">
                                {{-- ///////////// University ///////////// --}}
                                <div class=" p-2 bg-gray-200 rounded-md font-sec font-bold flex text-tawsila-600  ">

                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                        class="min-w-6 max-w-6 mr-1 ml-2" fill="#121252">
                                        <path
                                            d="M288 0H400c8.8 0 16 7.2 16 16V80c0 8.8-7.2 16-16 16H320.7l89.6 64H512c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H336V400c0-26.5-21.5-48-48-48s-48 21.5-48 48V512H64c-35.3 0-64-28.7-64-64V224c0-35.3 28.7-64 64-64H165.7L256 95.5V32c0-17.7 14.3-32 32-32zm48 240a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM80 224c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V240c0-8.8-7.2-16-16-16H80zm368 16v64c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V240c0-8.8-7.2-16-16-16H464c-8.8 0-16 7.2-16 16zM80 352c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V368c0-8.8-7.2-16-16-16H80zm384 0c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V368c0-8.8-7.2-16-16-16H464z" />
                                    </svg>
                                    <div class="truncate">
                                        <span class="text-soft_black"> رحلة الى : </span>
                                        <span
                                            class="font-pr text-lg font-normal text-tawsila-600 ">{{ $trip->university->name }}</span>
                                    </div>

                                </div>
                                {{-- ///////////// Areas ///////////// --}}
                                <div class="p-3 bg-gray-200 rounded-md font-sec font-bold my-6 ">
                                    <div class="flex gap-2 mb-3 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="#121252"
                                            class="w-6">
                                            <path
                                                d="M408 120c0 54.6-73.1 151.9-105.2 192c-7.7 9.6-22 9.6-29.6 0C241.1 271.9 168 174.6 168 120C168 53.7 221.7 0 288 0s120 53.7 120 120zm8 80.4c3.5-6.9 6.7-13.8 9.6-20.6c.5-1.2 1-2.5 1.5-3.7l116-46.4C558.9 123.4 576 135 576 152V422.8c0 9.8-6 18.6-15.1 22.3L416 503V200.4zM137.6 138.3c2.4 14.1 7.2 28.3 12.8 41.5c2.9 6.8 6.1 13.7 9.6 20.6V451.8L32.9 502.7C17.1 509 0 497.4 0 480.4V209.6c0-9.8 6-18.6 15.1-22.3l122.6-49zM327.8 332c13.9-17.4 35.7-45.7 56.2-77V504.3L192 449.4V255c20.5 31.3 42.3 59.6 56.2 77c20.5 25.6 59.1 25.6 79.6 0zM288 152a40 40 0 1 0 0-80 40 40 0 1 0 0 80z" />
                                        </svg>
                                        <p class="font-sec font-bold"> أحياء الرياض : </p>
                                    </div>
                                    <div class="flex gap-2 flex-wrap">
                                        @foreach ($trip->areas as $area)
                                            <div
                                                class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-md font-medium bg-gray-700 hover:bg-gray-900 hover:cursor-pointer text-white">
                                                {{ $area->name }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                            <a href={{ route('trips.show', ['trip' => $trip->id]) }} class=" ">
                                <button
                                    class="overflow-hidden w-full p-2 h-12 bg-black text-white border-none  text-xl font-bold cursor-pointer relatidve z-10 group absolute bottom-0">
                                    إشترك الان
                                    <span
                                        class="absolute w-full h-32 -top-[5.1rem] left-1 bg-white rotate-12 transform scale-x-0 group-hover:scale-x-300 transition-transform group-hover:duration-500 duration-1000 origin-left"></span>
                                    <span
                                        class="absolute w-full h-32 -top-[5.1rem] left-1 bg-tawsila-200 rotate-12 transform scale-x-0 group-hover:scale-x-100 transition-transform group-hover:duration-700 duration-700 origin-left"></span>
                                    <span
                                        class="absolute w-full h-32 -top-[5.1rem] left-1 bg-pr rotate-12 transform scale-x-0 group-hover:scale-x-100 transition-transform group-hover:duration-1000 duration-500 origin-left"></span>
                                    <span
                                        class="group-hover:opacity-100 group-hover:duration-1000 duration-100 opacity-0 absolute top-2.5 right-6 z-10 text-soft_black">إشترك
                                        الان</span>
                                </button>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="flex flex-col justify-center items-center col-span-3">
                        <img src="{{ asset('assets/graphics/images/search.png') }}" alt="no result" class="w-64 my-8">
                        <p class="font-pr text-2xl md:text-3xl lg:text-5xl ">عفوًا، لم يتم العثور على أي رحلات.</p>
                    </div>
                @endforelse
            </div>
        </div>
        <div class="mx-auto max-w-screen-xl mt-12 ">
            {{ $trips->links() }}
        </div>
    </div>
@endsection
