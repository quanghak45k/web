<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ForgotPasswordController;
use App\Http\Controllers\Admin\ResetPasswordController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::match(['get','post'], '/login', [LoginController::class, 'login'])->name('admin.login');

Route::get('/ForgetPassword', function (){
    return view('admin.auth.admin_forgot_password');
});
Route::post('/sendmail', [ForgotPasswordController::class, 'post'])->name('sendmail');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'getPassword'])->name('reset.password');
Route::post('/reset-password', [ResetPasswordController::class, 'update'])->name('update.password');

Route::middleware('auth:admin')->group(function(){
    Route::get('/dashboard', [Homecontroller::class, 'index'])->name('dashboard');
    Route::get('/logout', [Homecontroller::class, 'logout'])->name('admin.logout');

});


