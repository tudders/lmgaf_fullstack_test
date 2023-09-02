<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\MainController::class, 'home'])->name('home');
Route::get('/login', [\App\Http\Controllers\MainController::class, 'login'])->name('login');
Route::get('/main', [\App\Http\Controllers\MainController::class, 'main'])->name('main');
Route::get('/createaccount', [\App\Http\Controllers\MainController::class, 'createaccount'])->name('createaccount');
Route::get('/logout', [\App\Http\Controllers\MainController::class, 'logout'])->name('logout');

Route::post('/createaccountsubmit', [\App\Http\Controllers\PostController::class, 'createaccountsubmit']);
Route::post('/loginsubmit', [\App\Http\Controllers\PostController::class, 'loginsubmit']);
Route::post('/submitpost', [\App\Http\Controllers\PostController::class, 'submitpost']);
Route::post('/deletepost', [\App\Http\Controllers\PostController::class, 'deletepost']);
