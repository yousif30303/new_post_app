<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\PostLikesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::post('logout',[LogoutController::class,'store'])->name('logout');


Route::get('posts',[PostController::class,'index']);
Route::post('posts',[PostController::class,'store'])->name('posts');
Route::delete('posts/{post}',[PostController::class,'destroy'])->name('posts.destroy');

Route::post('posts/{post}',[PostLikesController::class,'store'])->name('posts.like');
Route::delete('post/{post}/likes',[PostLikesController::class,'destroy'])->name('posts.like.destroy');

Route::get('user/{user:username}/post',[UserPostController::class,'index'])->name('user.posts');