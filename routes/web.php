<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::view('/', 'index')->name('login');
Route::view('/register', 'register');
Route::post('login', LoginController::class);
Route::get('logout', LogoutController::class);
Route::post('register', RegisterController::class);
Route::get('dashboard', DashboardController::class)->middleware('auth');
Route::post('comments', CommentController::class)->middleware('auth');
Route::post('likes', LikesController::class)->name('like.comment');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
