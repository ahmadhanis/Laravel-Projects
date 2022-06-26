<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductListController;

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

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'register'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/saveproduct', [ProductListController::class,'saveProduct'])->name('saveproduct');
Route::get('mainpage', [ProductListController::class, 'mainpage'])->name('mainpage');
Route::post('/markDeleteRoute/{id}', [ProductListController::class, 'markDelete'])->name('markDelete');
Route::post('/markUpdateRoute/{id}', [ProductListController::class, 'markUpdate'])->name('markUpdate');


