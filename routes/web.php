<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SendController;

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

Route::get('/register',[\App\Http\Controllers\UserController::class,'getRegister'])->name('register');
Route::post('/register',[\App\Http\Controllers\UserController::class,'postRegister']);
Route::get('/login',[\App\Http\Controllers\UserController::class,'getLogin'])->name('login');
Route::post('/login',[\App\Http\Controllers\UserController::class,'postLogin']);
Route::get('/logout',[\App\Http\Controllers\UserController::class,'logout'])->name('logout');

Route::get('/',[\App\Http\Controllers\MainController::class,'index'])->name('top');

Route::get('/mypage',[\App\Http\Controllers\MainController::class,'mypage'])->name('mypage')->middleware('auth');
Route::get('/mypage',[\App\Http\Controllers\MainController::class,'sended'])->name('mypage')->middleware('auth');

Route::get('/send',[\App\Http\Controllers\SendController::class,'index'])->name('send')->middleware('auth');
Route::post('/send',[\App\Http\Controllers\SendController::class,'send']);

