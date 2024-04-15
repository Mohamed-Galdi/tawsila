@extends('layouts.master')
@section('content')
    <div style="background-image: url('./assets/graphics/images/bg.svg')"
        class=" h-[90vh] grid place-items-center bg-no-repeat bg-cover bg-buttom ">
        <div
            class=" md:w-3/4 w-4/5 lg:w-2/3 min-h-[70vh] rounded-3xl shadow-2xl flex overflow-hidden mx-auto max-w-screen-xl">
            <div class="hidden md:block lg:w-1/3 w-1/2 bg-gradient-to-t from-soft_black to-tawsila-400  relative">
                <h2 class="font-pr text-4xl text-center mt-20">التسجيل كسائق</h2>
                <img class=" absolute bottom-0" src="./assets/graphics/images/driver.png" alt="">
            </div>
            <div class=" w-full lg:w-2/3 md:w-1/2 backdrop-blur-sm bg-white/30 grid place-items-center p-8">
                <form class="w-full" action="{{ route('driverRegister') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="w-full lg:flex gap-6">
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="name" id="floating_name" value="{{ old('name') }}"
                                class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-white focus:outline-none focus:ring-0 focus:border-soft_black peer"
                                placeholder=" " required />
                            @error('name')
                                <div class="text-tawsila-800">{{ $message }}</div>
                            @enderror
                            <label for="floating_name"
                                class="peer-focus:font-medium absolute font-sec font-bold text-lg text-soft_black  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:soft_black peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">الإسم
                                الكامل</label>
                        </div>
                        <div class="flex flex-col gap-2 w-full mt-3">
                            <label for="image" id="image_label"
                                class="bg-gray-200 text-center font-pr py-2 rounded-lg text-black hover:cursor-pointer hover:black">
                                الصورة الشخصية
                            </label>
                            <input name="image" type="file" id="image" class="hidden"
                                onchange="displayFileName('image', 'image_label')">
                            @error('image')
                                <div class="text-tawsila-800">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="email" name="email" id="floating_email" value="{{ old('email') }}"
                            class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-white focus:outline-none focus:ring-0 focus:border-soft_black peer"
                            placeholder=" " required />
                        @error('email')
                            <div class="text-tawsila-800">{{ $message }}</div>
                        @enderror
                        <label for="floating_email"
                            class="peer-focus:font-medium font-sec font-bold absolute text-lg text-soft_black  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:soft_black peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            البريد الإلكتروني</label>
                    </div>
                    <div class="lg:flex gap-6">
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="password" name="password" id="floating_password"
                                class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-white focus:outline-none focus:ring-0 focus:border-soft_black peer"
                                placeholder=" " required />
                            @error('password')
                                <div class="text-tawsila-800">{{ $message }}</div>
                            @enderror
                            <label for="floating_password"
                                class="peer-focus:font-medium font-sec font-bold absolute text-lg text-soft_black  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:soft_black peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                كلمة المرور</label>
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="password" name="password_confirmation" id="floating_password_confirmation"
                                class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-white focus:outline-none focus:ring-0 focus:border-soft_black peer"
                                placeholder=" " required />
                            @error('password')
                                <div class="text-tawsila-800">{{ $message }}</div>
                            @enderror
                            <label for="floating_password_confirmation"
                                class="peer-focus:font-medium font-sec font-bold absolute text-lg text-soft_black  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:soft_black peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                تأكيد كلمة المرور</label>
                        </div>
                    </div>
                    <div class="w-full lg:flex gap-6">
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="license_number" id="floating_license_number"
                                value="{{ old('license_number') }}"
                                class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-white focus:outline-none focus:ring-0 focus:border-soft_black peer"
                                placeholder=" " required />
                            @error('name')
                                <div class="text-tawsila-800">{{ $message }}</div>
                            @enderror
                            <label for="floating_license_number"
                                class="peer-focus:font-medium absolute font-sec font-bold text-lg text-soft_black  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:soft_black peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                رقم الرخصة</label>
                        </div>
                        <div class="flex flex-col gap-2 w-full mt-3">
                            <label for="license_image" id="license_image_label"
                                class="bg-gray-200 text-center font-pr py-2 rounded-lg text-black hover:cursor-pointer hover:black">
                                صورة الرخصة
                            </label>
                            <input name="license_image" type="file" id="license_image" class="hidden"
                                onchange="displayFileName('license_image', 'license_image_label')">
                            @error('license_image')
                                <div class="text-tawsila-800">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex flex-col gap-2 w-full mt-3">
                                <div class="relative flex items-center max-w-[11rem]">
                                    <button type="button" id="increment-button"
                                        data-input-counter-increment="experience"
                                        class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                        <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M9 1v16M1 9h16" />
                                        </svg>
                                    </button>
                                    <input type="text" id="experience" data-input-counter name="experience"
                                        data-input-counter-min="1" data-input-counter-max="20"
                                        aria-describedby="helper-text-explanation"
                                        class="bg-gray-50 border-x-0 border-gray-300 h-11 font-medium text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full pb-6 "
                                        placeholder="" value="1" required />
                                    <div
                                        class="absolute bottom-1 start-1/2 -translate-x-1/2 rtl:translate-x-1/2 flex items-center text- text-gray-400 space-x-1 rtl:space-x-reverse">
                                        
                                        <span>سنوات خبرة </span>
                                    </div>
                                    <button type="button" id="decrement-button"
                                        data-input-counter-decrement="experience"
                                        class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                        <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M1 1h16" />
                                        </svg>
                                    </button>
                                    
                                </div>
                                {{-- <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                                    Please select the number of bedrooms.</p> --}}

                        </div>
                    </div>
                    <button
                        class="bg-pr w-full mt-4 p-2 rounded-lg text-center text-soft_black font-pr hover:shadow-xl hover:cursor-pointer"
                        type="submit">إنشاء حساب</button>

                </form>
                <a class="mt-4" href="student-register"><button
                        class="bg-soft_black text-white font-pr p-2 rounded-lg flex gap-2">التسجيل
                        كطالبة
                        <img src="./assets/graphics/images/woman.png" alt="" class="max-w-6">
                    </button></a>

            </div>
        </div>
        <script>
            function displayFileName(inputId, labelId) {
                const input = document.getElementById(inputId);
                const label = document.getElementById(labelId);

                if (input.files && input.files[0]) {
                    label.textContent = input.files[0].name;
                } else {
                    label.textContent = 'تحميل الصورة';
                }
            }
        </script>
    </div>
@endsection
