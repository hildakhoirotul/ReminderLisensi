<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/welcome', function () {
    return view('welcome');
});
Auth::routes();

Route::controller(AdminController::class)->middleware('is_admin')->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
    Route::get('/account-list', 'userPage')->name('userpage');
    Route::get('/notifications', 'notifikasi')->name('notifikasi');
    Route::post('/store-data', 'store')->name('data.store');
});

Route::controller(HomeController::class)->middleware('is_user')->group(function () {
    Route::get('/home', 'index')->name('home');
    Route::get('/notification', 'notifikasi')->name('notifikasi');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('is_user')->name('home');
