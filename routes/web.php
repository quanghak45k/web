<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;

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
Route::get('/', function (){
    return view('user.home');
})->name('home');



Route::get('/login', [UserController::class, 'index'])->name('user.login');
Route::post('/postLogin', [UserController::class, 'post'])->name('user.postLogin');
Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');

Route::get('/user/register', [UserController::class, 'register'])->name('user.register');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');

Route::get('/home', function (){
    return view('user.home');
})->middleware(['auth', 'is_verify_active']);
Route::get('user/verify/{token}', [UserController::class, 'verify'])->name('user.verify');
