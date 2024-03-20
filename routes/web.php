<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home.home');
});
Route::get('/about-us', function () {
    return view('home.about_us');
});
Route::get('/contact-us', function () {
    return view('home.contact_us');
});
Route::get('/student-register', function () {
    return view('authentication.student_register');
});
Route::get('/driver-register', function () {
    return view('authentication.driver_register');
});
