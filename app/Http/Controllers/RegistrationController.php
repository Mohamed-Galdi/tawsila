<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class RegistrationController extends Controller
{
    public function studentRegister(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming image validation
        ]);

        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = $validated['password'];
        $user->role = 'student';
        if ($request->hasFile('image')) {
            $image_name = str_replace(" ", "_", $validated['name']) . '-' . Str::random(10) . '.' . $request->file('image')->extension();
            $image = $request->file('image');
            $path = $image->storeAs('student_images', $image_name, 'public');
            $user->image =  $path;
        }
        $user->save();

        $student = new Student();
        $student->user_id = $user->id;
        $student->save();

        Alert::success('تم إنشاء الحساب بنجاح، قم بالدخول الان');

        return redirect('/');
    }

    public function driverRegister(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'license_number' => 'required|string|max:255',
            'license_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = $validated['password'];
        $user->role = 'driver';
        if ($request->hasFile('image')) {
            $image_name = str_replace(" ", "_", $validated['name']) . '-' . Str::random(10) . '.' . $request->file('image')->extension();
            $image = $request->file('image');
            $path = $image->storeAs('drivers_images', $image_name, 'public');
            $user->image =  $path;
        }
        $user->save();

        $driver = new Driver();
        $driver->user_id = $user->id;
        $driver->license_number = $validated['license_number'];
        if ($request->hasFile('license_image')) {
            $image_name = str_replace(" ", "_", $validated['name']) . '_licenseImage-' . Str::random(6) . '.' . $request->file('license_image')->extension();
            $image = $request->file('license_image');
            $path = $image->storeAs('drivers_licenses', $image_name, 'public');
            $driver->license_image =  $path;
        }
        $driver->save();
        Alert::success('تم إنشاء الحساب بنجاح، قم بالدخول الان');
        return redirect('/');
    }
}
