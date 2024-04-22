@extends('layouts.master')
@section('content')
    <div style="background-image: url('./assets/graphics/images/bg.svg')"
        class=" h-[90vh] grid place-items-center bg-no-repeat bg-cover bg-buttom ">
        <div
            class="md:w-3/4 w-4/5 lg:w-2/3 min-h-[70vh] rounded-3xl shadow-2xl flex overflow-hidden mx-auto max-w-screen-xl">
            <div class=" w-full lg:w-2/3 md:w-1/2 backdrop-blur-sm bg-white/30 grid place-items-center p-8">
                <a class="" href="driver-register"><button
                        class="bg-soft_black text-white font-pr p-2 rounded-lg flex gap-2">التسجيل
                        كسائق
                        <img src="./assets/graphics/images/drvr.png" alt="" class="max-w-6">
                    </button></a>
                <form class="w-full" action="{{ route('studentRegister') }}" enctype="multipart/form-data" method="POST">
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
                            <input name="image" type="file" id="image" class="hidden" onchange="displayFileName()">
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
                    <button
                        class="bg-pr w-full mt-4 p-2 rounded-lg text-center text-soft_black font-pr hover:shadow-xl hover:cursor-pointer"
                        type="submit">إنشاء حساب</button>

                </form>


            </div>
            <div class="hidden md:block lg:w-1/3 w-1/2 bg-gradient-to-t from-soft_black to-tawsila-400 relative">
                <h2 class="font-pr text-4xl text-center mt-20 text-soft_black">التسجيل كطالبة</h2>
                <img class=" absolute bottom-0" src="./assets/graphics/images/student.png" alt="">
            </div>
        </div>
        <script>
            function displayFileName() {
                const input = document.getElementById('image');
                const label = document.getElementById('image_label');

                if (input.files && input.files[0]) {
                    label.textContent = input.files[0].name;
                } else {
                    label.textContent = 'تحميل الصورة';
                }
            }
        </script>
    </div>
@endsection
