<?php

use App\Http\Controllers\RegistrationController;
use App\Models\AboutPage;
use App\Models\ContactPage;
use App\Models\HomePage;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

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
    $content = HomePage::first();
    return view('home.home', ['content' => $content]);
});
Route::get('/about-us', function () {
    $content = AboutPage::first();
    return view('home.about_us', ['content' => $content]);
});
Route::get('/contact-us', function () {
    $content = ContactPage::first();
    return view('home.contact_us', ['content' => $content]);
});
Route::post('/contact-us', function () {
    Alert::success('تم إستقبال رسالتك، سنرد عليك في أقرب وقت');
    return redirect()->back();
})->name('contactUs');

/////////////////////// Authentication /////////////////////////
Route::get('/student-register', function () {
    return view('authentication.student_register');
});
Route::get('/driver-register', function () {
    return view('authentication.driver_register');
});
Route::post('/student-register', [RegistrationController::class, 'studentRegister'])->name('studentRegister');
Route::post('/driver-register', [RegistrationController::class, 'driverRegister'])->name('driverRegister');
