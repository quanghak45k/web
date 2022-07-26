<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ForgotPasswordController;
use App\Http\Controllers\Admin\ResetPasswordController;
use App\Http\Controllers\Admin\User\UserController;

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
    Route::get('/profile', [Homecontroller::class, 'profile'])->name('admin.profile');
    Route::post('/update', [Homecontroller::class, 'update'])->name('admin.update');

    Route::get('/dashboard/create/user', function (){
        return view('admin.admin_create_user');})->name('create.user');
    Route::post('/dashboard/store/user', [UserController::class, 'store'])->name('store.user');
    Route::get('/dashboard/show/user/{id}', [UserController::class, 'show'])->name('show.user');
    Route::get('/dashboard/edit/user/{id}', [UserController::class, 'edit'])->name('edit.user');
    Route::post('/dashboard/update/user/{id}', [UserController::class, 'update'])->name('update.user');
    Route::post('/dashboard/delete/user/', [UserController::class, 'destroy'])->name('delete.user');

});


