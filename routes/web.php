<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HasilUjianController;
use App\Http\Controllers\TestController;
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
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authentikasi']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/signup', [LoginController::class, 'signup'])->middleware('guest');
Route::post('/signup', [LoginController::class, 'register']);


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::resource('ujian', TestController::class)->middleware('auth');
Route::resource('hasil', HasilUjianController::class)->middleware('auth');
