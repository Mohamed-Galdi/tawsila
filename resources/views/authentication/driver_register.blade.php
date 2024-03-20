@extends('layouts.master')
@section('content')
    <div style="background-image: url('./assets/graphics/images/bg.svg')"
        class=" h-[90vh] grid place-items-center bg-no-repeat bg-cover bg-buttom ">
        <div class=" w-2/3 h-4/5 rounded-3xl shadow-2xl flex overflow-hidden">
            <div class="h-full w-1/3  bg-gradient-to-t from-soft_black to-tawsila-400  relative">
                <h2 class="font-pr text-4xl text-center mt-20">التسجيل كسائق</h2>
                <img class=" absolute bottom-0" src="./assets/graphics/images/driver.png" alt="">
            </div>
            <div class="h-full w-2/3 backdrop-blur-sm bg-white/30 grid place-items-center p-8">
                <form class="w-full ">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="email" name="floating_email" id="floating_email"
                            class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-white focus:outline-none focus:ring-0 focus:border-soft_black peer"
                            placeholder=" " required />
                        <label for="floating_email"
                            class="peer-focus:font-medium absolute text-lg text-soft_black  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:soft_black peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">الإسم
                            الكامل</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="email" name="floating_email" id="floating_email"
                            class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-white focus:outline-none focus:ring-0 focus:border-soft_black peer"
                            placeholder=" " required />
                        <label for="floating_email"
                            class="peer-focus:font-medium absolute text-lg text-soft_black  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:soft_black peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            البريد الإلكتروني</label>
                    </div>
                    <div class="flex gap-6">
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="email" name="floating_email" id="floating_email"
                                class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-white focus:outline-none focus:ring-0 focus:border-soft_black peer"
                                placeholder=" " required />
                            <label for="floating_email"
                                class="peer-focus:font-medium absolute text-lg text-soft_black  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:soft_black peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">كلمة
                                المرور
                            </label>
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="email" name="floating_email" id="floating_email"
                                class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-white focus:outline-none focus:ring-0 focus:border-soft_black peer"
                                placeholder=" " required />
                            <label for="floating_email"
                                class="peer-focus:font-medium absolute text-lg text-soft_black  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:soft_black peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                تأكيد كلمة المرور</label>
                        </div>
                    </div>
                    <div
                        class="bg-pr mt-4 p-2 rounded-lg text-center text-soft_black font-pr hover:shadow-xl hover:cursor-pointer">
                        <button>إنشاء حساب</button>
                    </div>

                </form>
                <a href="student-register"><button class="bg-soft_black text-white font-pr p-2 rounded-lg ">التسجيل كطالبة
                    </button></a>

            </div>



        </div>
    </div>
@endsection
