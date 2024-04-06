@extends('layouts.master')
@section('content')
    <div class="w-full h-[90vh] bg-pr flex justify-center items-center">
        <div class="bg-gray-200 rounded-xl w-4/6 h-5/6 flex flex-col md:flex-row overflow-hidden">

            {{-- //////////////////// Driver Login //////////////////////// --}}
            <div class="md:w-1/2 w-full md:h-full h-1/2 bg-gray-900 relative">
                <h2 class="font-pr text-4xl text-center md:mt-20 mt-8 text-white mb-8 ">الدخول كسائق</h2>
                {{-- login button --}}
                <div class="w-full flex items-center justify-center cursor-pointer">
                    <a href="/driver/login"
                        class="relative inline-flex items-center justify-start py-3 pl-4 pr-12 overflow-hidden font-semibold shadow text-soft_black transition-all duration-150 ease-in-out rounded hover:pl-10 hover:pr-6 bg-gray-100 dorkbg-gray-700 dorktext-white dorkhover:text-gray-200 dorkshadow-none group">
                        <span
                            class="absolute bottom-0 left-0 w-full h-1 transition-all duration-150 ease-in-out bg-pr group-hover:h-full"></span>
                        <span class="absolute right-0 pr-4 duration-200 ease-out group-hover:translate-x-12">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" fill="#000"
                                class="w-5 h-5 text-tawsila-500">
                                <path
                                    d="M217.9 105.9L340.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L217.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1L32 320c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM352 416l64 0c17.7 0 32-14.3 32-32l0-256c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0c53 0 96 43 96 96l0 256c0 53-43 96-96 96l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32z" />
                            </svg>
                        </span>
                        <span
                            class="absolute left-0 pl-2.5 -translate-x-12 group-hover:translate-x-0 ease-out duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" fill="#000"
                                class="w-5 h-5 text-tawsila-500">
                                <path
                                    d="M217.9 105.9L340.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L217.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1L32 320c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM352 416l64 0c17.7 0 32-14.3 32-32l0-256c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0c53 0 96 43 96 96l0 256c0 53-43 96-96 96l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32z" />
                            </svg>
                        </span>
                        <span
                            class="relative w-full text-left transition-colors duration-200 ease-in-out group-hover:text-soft_black dorkgroup-hover:text-gray-800 font-pr">الدخول</span>
                    </a>
                </div>
                <p class="text-center font-pr mt-4 text-gray-100">
                    ليس لديك حساب بعد، قم بإنشائه <span class="text-blue-500 cursor-pointer"><a href="/driver-register">من
                            هنا</a></span>
                </p>
                <img class="w-1/2 bottom-0 absolute left-[25%] hidden md:block" src="./assets/graphics/images/driver.png"
                    alt="">
            </div>

            {{-- //////////////////// Student Login //////////////////////// --}}
            <div class="md:w-1/2 w-full md:h-full h-1/2 bg-gray-100 relative">
                <h2 class="font-pr text-4xl text-center md:mt-20 mt-8 text-soft_black mb-8 ">الدخول كطالبة</h2>
                {{-- login button --}}
                <div class="w-full flex items-center justify-center cursor-pointer">
                    <a href="/student/login"
                        class="relative inline-flex items-center justify-start py-3 pl-4 pr-12 overflow-hidden font-semibold shadow text-pr transition-all duration-150 ease-in-out rounded hover:pl-10 hover:pr-6 bg-soft_black dorkbg-gray-700 dorktext-white dorkhover:text-gray-200 dorkshadow-none group">
                        <span
                            class="absolute bottom-0 left-0 w-full h-1 transition-all duration-150 ease-in-out bg-pr group-hover:h-full"></span>
                        <span class="absolute right-0 pr-4 duration-200 ease-out group-hover:translate-x-12">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" fill="#f6dc00"
                                class="w-5 h-5 text-tawsila-500">
                                <path
                                    d="M217.9 105.9L340.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L217.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1L32 320c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM352 416l64 0c17.7 0 32-14.3 32-32l0-256c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0c53 0 96 43 96 96l0 256c0 53-43 96-96 96l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32z" />
                            </svg>
                        </span>
                        <span
                            class="absolute left-0 pl-2.5 -translate-x-12 group-hover:translate-x-0 ease-out duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" fill="#000"
                                class="w-5 h-5 text-tawsila-500">
                                <path
                                    d="M217.9 105.9L340.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L217.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1L32 320c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM352 416l64 0c17.7 0 32-14.3 32-32l0-256c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0c53 0 96 43 96 96l0 256c0 53-43 96-96 96l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32z" />
                            </svg>
                        </span>
                        <span
                            class="relative w-full text-left transition-colors duration-200 ease-in-out group-hover:text-soft_black dorkgroup-hover:text-gray-800 font-pr">الدخول</span>
                    </a>
                </div>
                <p class="text-center font-pr mt-4">
                    ليس لديك حساب بعد، قم بإنشائه <span class="text-blue-500 cursor-pointer"><a href="/student-register">من
                            هنا</a></span>
                </p>
                <img class="w-1/2 bottom-0 absolute left-[25%] hidden md:block" src="./assets/graphics/images/student.png"
                    alt="">
            </div>
        </div>
    </div>
@endsection
