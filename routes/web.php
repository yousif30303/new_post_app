<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

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
    return view('welcome');
});

Route::get('home',function(){
    return view('home');
})->name('home');

Route::get('register',[RegisterController::class,'index']);
Route::post('register',[RegisterController::class,'store'])->name('register');

Route::get('login',[LoginController::class,'index']);
Route::post('login',[LoginController::class,'store'])->name('login');