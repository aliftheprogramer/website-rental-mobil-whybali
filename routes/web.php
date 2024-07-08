<?php

use App\Models\Mobil;
use App\Models\feedback;
use Illuminate\Routing\Controller;
use App\Http\Controllers\dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\dashboardController;

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
    return view('home', [
        'title' => 'WhyBali | tour and travel',
        'active' => 'home',
        'feedbacks' => feedback::with('user')->get()
    ]);
});


Route::get('/daftar-mobil', function() {
    return view('daftar', [
        'title' => 'WhyBali | tour and travel | list mobil',
        'active' => 'daftar',
        'mobils' => Mobil::with(['rentals', 'feedback'])->latest()->get(),
    ]);
});

Route::get('/contact', function(){
    return view('contact', [
        'title' => 'WhyBali | tour and travel | kontak kami',
        'active' => 'contact'
    ]);
});

// Route::get('/dashboard', function(){
//     return view('admin.dashboard', [
//         'title' => 'Dashboard',
//         'active' => 'dashboard',
//         'mobil' => Mobil::with(['rentals', 'feedback'])->get(),
//     ]);
// });
Route::get('/dashboard', [dashboardController::class, 'index'])->middleware('admin');
// Route::resource('/dashboard/{mobil:plat_mobil}', dashboardController::class);

Route::get('/dashboard/{mobils:plat_mobil}', [dashboardController::class, 'show'])->middleware('admin');

Route::get('/tambahmobil', function() {
    return view('admin.tambahmobil');
})->middleware('admin');

Route::post('/tambahmobil', [DashboardController::class, 'store'])->middleware('admin');
// Route::resource('/dashboard', DashboardController::class);
// route::get('/dashboard/{mobils:plat_mobil}/edit', [dashboardController::class, 'edit']);
// route::put('/dashboard/edit', [dashboardController::class, 'update']);

Route::get('/dashboard/{mobil:plat_mobil}/edit', [DashboardController::class, 'edit'])->middleware('admin');
Route::put('/dashboard/{mobil:plat_mobil}', [DashboardController::class, 'update'])->middleware('admin');

route::delete('/delete',[dashboardController::class, 'destroy'])->middleware('admin');
Route::delete('/hapusmobil/{plat_mobil}', [DashboardController::class, 'destroy'])->middleware('admin');

// Rute untuk registrasi
Route::get('/register', [registerController::class, 'showRegistrationForm']);
Route::post('/register', [registerController::class, 'register']);

// Rute untuk login
Route::get('/login', [loginController::class, 'showLoginForm'])->middleware('guest');
Route::post('/login', [loginController::class, 'login'])->middleware('guest');
Route::post('/logout', [loginController::class, 'logout'])->middleware('auth');

Route::post('/feedback', [FeedbackController::class, 'store'])->middleware('checkauth');

