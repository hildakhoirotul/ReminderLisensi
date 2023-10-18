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
Auth::routes();

Route::controller(AdminController::class)->middleware('is_admin')->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
    Route::get('/account-list', 'userPage')->name('userpage');
    Route::get('/notifications', 'notifikasi')->name('notifikasi');
    Route::post('/store-data', 'store')->name('data.store');
    Route::post('/store-user', 'userStore')->name('user.store');
    Route::post('/import-database', 'importDatabase')->name('import.database');
    Route::get('/export-database', 'exportDatabase')->name('export.database');
    Route::get('reset-lisensi', 'resetLisensi');
    Route::get('/search-lisensi', 'searchlisensi')->name('search.lisensi');
    Route::get('/search-user', 'searchUser')->name('search.user');
    Route::delete('/destroy/{id}', 'destroy')->name('lisensi.destroy');
    Route::delete('/destroy-user/{id}', 'userDestroy')->name('user.destroy');
    Route::post('/edit-lisensi', 'EditLisensi')->name('edit.lisensi');
    Route::post('/save-token', 'saveToken')->name('save.token');
    Route::post('/send-notif', 'sendNotif')->name('send.notif');
});

Route::controller(HomeController::class)->middleware('is_user')->group(function () {
    Route::get('/home', 'index')->name('home');
    Route::get('/notification', 'notifikasi')->name('notif');
    Route::post('/store-lisensi', 'store')->name('user.data.store');
    Route::post('/import-lisensi', 'importDatabase')->name('user.import.database');
    Route::get('/export-lisensi', 'exportDatabase')->name('user.export.database');
    Route::get('reset-database', 'resetLisensi');
    Route::get('/search-database', 'searchlisensi')->name('user.search.lisensi');
    Route::delete('/destroy-lisensi/{id}', 'destroy')->name('user.lisensi.destroy');
    Route::post('/user-edit-lisensi', 'EditLisensi')->name('user.edit.lisensi');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('is_user')->name('home');
