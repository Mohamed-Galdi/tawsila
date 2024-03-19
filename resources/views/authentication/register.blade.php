@extends('layouts.master')
@section('content')
    <div class="min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="text-center text-3xl font-extrabold text-gray-900">
                Register
            </h2>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <div class="mb-6">
                    <div class="flex items-center justify-center">
                        <button id="toggleBtn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Register as Student
                        </button>
                    </div>
                </div>
                <form class="space-y-6" action="#" method="POST">
                    <!-- Student Registration Fields -->
                    <div id="studentFields" class="hidden">
                        <div>
                            <label for="studentName" class="block text-sm font-medium text-gray-700">Full Name</label>
                            <input id="studentName" name="studentName" type="text" autocomplete="name" required
                                class="mt-1 p-2 block w-full shadow-sm sm:text-sm rounded-md">
                        </div>

                        <div>
                            <label for="studentEmail" class="block text-sm font-medium text-gray-700">Email
                                address</label>
                            <input id="studentEmail" name="studentEmail" type="email" autocomplete="email" required
                                class="mt-1 p-2 block w-full shadow-sm sm:text-sm rounded-md">
                        </div>
                    </div>

                    <!-- Teacher Registration Fields -->
                    <div id="teacherFields">
                        <div class="mt-6">
                            <label for="teacherName" class="block text-sm font-medium text-gray-700">Full Name</label>
                            <input id="teacherName" name="teacherName" type="text" autocomplete="name" required
                                class="mt-1 p-2 block w-full shadow-sm sm:text-sm rounded-md">
                        </div>

                        <div class="mt-6">
                            <label for="teacherEmail" class="block text-sm font-medium text-gray-700">Email
                                address</label>
                            <input id="teacherEmail" name="teacherEmail" type="email" autocomplete="email" required
                                class="mt-1 p-2 block w-full shadow-sm sm:text-sm rounded-md">
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const toggleBtn = document.getElementById('toggleBtn');
        const studentFields = document.getElementById('studentFields');
        const teacherFields = document.getElementById('teacherFields');

        toggleBtn.addEventListener('click', () => {
            if (studentFields.classList.contains('hidden')) {
                toggleBtn.textContent = 'Register as Student';
                studentFields.classList.remove('hidden');
                teacherFields.classList.add('hidden');
            } else {
                toggleBtn.textContent = 'Register as Teacher';
                studentFields.classList.add('hidden');
                teacherFields.classList.remove('hidden');
            }
        });
    </script>
@endsection
