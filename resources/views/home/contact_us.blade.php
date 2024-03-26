@extends('layouts.master')
@section('content')
    <div class=" pb-12 bg-no-repeat bg-cover" style="background-image: url('./assets/graphics/images/contact_bg.svg')">
        {{-- //////////////////////////// MAp //////////////////////////// --}}
        <div id="map" class="relative h-[300px] overflow-hidden bg-cover bg-[50%] bg-no-repeat">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d466375.2057378051!2d46.67588590161507!3d24.630363422039206!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sma!4v1711215079215!5m2!1sen!2sma"
                width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        {{-- //////////////////////////// Card //////////////////////////// --}}
        <div class="mx-auto max-w-screen-lg flex justify-center">
            <div
                class="md:w-[70vw] w-[85vw] rounded-2xl shadow-2xl backdrop-blur-lg bg-white/60  -mt-[100px] z-30 relative flex flex-col justify-center items-center overflow-hidden py-6 gap-6">
                {{-- //////////////////////////// Contact Info //////////////////////////// --}}
                <div class=" w-full  flex flex-col md:flex-row gap-4 justify-evenly text-center">
                    <div class="flex flex-col justify-center items-center ">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-14">
                            <path
                                d="M384 32c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96C0 60.7 28.7 32 64 32H384zm-90.7 96.7c-9.7-2.6-19.9 2.3-23.7 11.6l-20 48c-3.4 8.2-1 17.6 5.8 23.2L280 231.7c-16.6 35.2-45.1 63.7-80.3 80.3l-20.2-24.7c-5.6-6.8-15-9.2-23.2-5.8l-48 20c-9.3 3.9-14.2 14-11.6 23.7l12 44C111.1 378 119 384 128 384c123.7 0 224-100.3 224-224c0-9-6-16.9-14.7-19.3l-44-12z" />
                        </svg>
                        <h3 class="font-sec">رقم الهاتف
                        </h3>
                        <p dir="ltr" class="font-pr mt-2 bg-pr px-2 rounded-lg md:w-fit w-2/3 ">{{ $content->phone }}
                        </p>
                    </div>
                    <div class="flex flex-col justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-16">
                            <path
                                d="M215.4 96H144 107.8 96v8.8V144v40.4 89L.2 202.5c1.6-18.1 10.9-34.9 25.7-45.8L48 140.3V96c0-26.5 21.5-48 48-48h76.6l49.9-36.9C232.2 3.9 243.9 0 256 0s23.8 3.9 33.5 11L339.4 48H416c26.5 0 48 21.5 48 48v44.3l22.1 16.4c14.8 10.9 24.1 27.7 25.7 45.8L416 273.4v-89V144 104.8 96H404.2 368 296.6 215.4zM0 448V242.1L217.6 403.3c11.1 8.2 24.6 12.7 38.4 12.7s27.3-4.4 38.4-12.7L512 242.1V448v0c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64v0zM176 160H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H176c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H176c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                        </svg>
                        <h3 class="font-sec">البريد الإلكتروني</h3>
                        <p class="font-pr mt-2 bg-pr px-2 rounded-lg md:w-fit w-2/3">{{ $content->email }}</p>
                    </div>
                    <div class="flex flex-col justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-16">
                            <path
                                d="M408 120c0 54.6-73.1 151.9-105.2 192c-7.7 9.6-22 9.6-29.6 0C241.1 271.9 168 174.6 168 120C168 53.7 221.7 0 288 0s120 53.7 120 120zm8 80.4c3.5-6.9 6.7-13.8 9.6-20.6c.5-1.2 1-2.5 1.5-3.7l116-46.4C558.9 123.4 576 135 576 152V422.8c0 9.8-6 18.6-15.1 22.3L416 503V200.4zM137.6 138.3c2.4 14.1 7.2 28.3 12.8 41.5c2.9 6.8 6.1 13.7 9.6 20.6V451.8L32.9 502.7C17.1 509 0 497.4 0 480.4V209.6c0-9.8 6-18.6 15.1-22.3l122.6-49zM327.8 332c13.9-17.4 35.7-45.7 56.2-77V504.3L192 449.4V255c20.5 31.3 42.3 59.6 56.2 77c20.5 25.6 59.1 25.6 79.6 0zM288 152a40 40 0 1 0 0-80 40 40 0 1 0 0 80z" />
                        </svg>
                        <h3 class="font-sec">موقع مركزنا</h3>
                        <p class="font-pr mt-2 bg-pr px-2 rounded-lg md:w-fit w-2/3">{{ $content->address }}
                        </p>
                    </div>
                </div>
                {{-- //////////////////////////// Diveder //////////////////////////// --}}
                <div class="w-4/5 rounded-xl h-1 bg-pr "></div>
                {{-- //////////////////////////// Contact Form //////////////////////////// --}}
                <div class="md:w-2/3 w-full flex justify-center items-center">
                    <form class="w-full px-8 mx-auto" method="POST" action="{{ route('contactUs') }}">
                        @csrf
                        <div class="mb-5">
                            <label for="name" class="block mb-2 text-lg text-gray-900 font-sec font-bold">الإسم</label>
                            <input type="text" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  block w-full p-2.5 "
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="email" class="block mb-2 text-lg font-sec font-bold text-gray-900 ">بريدك
                                الإلكتروني</label>
                            <input type="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg   block w-full p-2.5 "
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="message"
                                class="block mb-2 text-lg font-sec font-bold text-gray-900 ">رسالتك</label>
                            <textarea name="message" id="message" rows="3"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg   block w-full p-2.5 " required></textarea>
                        </div>
                        <button
                            class="bg-soft_black w-full text-white font-pr py-2 rounded-xl text-center hover:text-pr ">إرسال</button>
                    </form>

                </div>

            </div>

        </div>



    </div>
@endsection
