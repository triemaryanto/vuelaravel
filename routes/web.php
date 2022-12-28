<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
//page
Route::get('/admin', [AdminController::class, 'loginadmin'])->name('admin.login');
Route::get('/admin/register', [AdminController::class, 'register'])->name('register.admin');
Route::get('/admin/forgot', [AdminController::class, 'forgot'])->name('forgot');
Route::get('/login/anggota', [AdminController::class, 'loginanggota']);
Route::get('/admin/formforgot', [AdminController::class, 'formforgot'])->name('form.forgot');
//proses
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
Route::POST('admin/validate', [AdminController::class, 'validatelogin'])->name('user.validate');
Route::get('/user/verify/{token}', [UserController::class, 'verifyEmail'])->name('user.verify');
Route::get('/user/reset/{validasi}', [UserController::class, 'validasiPassword'])->name('validasi.password');
Route::get('/user/resent/{id}', [UserController::class, 'resent'])->name('user.resent');
Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home');
Route::post('/admin/forgot', [UserController::class, 'resetpassword'])->name('reset.password');
Auth::routes([
    'verify' => true
]);

Route::get('/home', [HomeController::class, 'index'])->name('home');
