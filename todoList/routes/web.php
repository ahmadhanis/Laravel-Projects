<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoListController;
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



Route::get('/', [AuthController::class, 'index'])->name('index');
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('mainpage', [TodoListController::class, 'mainpage']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('saveItem', [TodoListController::class, 'saveItem'])->name('saveItem');
Route::post('/markCompleteRoute/{id}', [TodoListController::class, 'markComplete'])->name('markComplete');
Route::post('/markDeleteRoute/{id}', [TodoListController::class, 'markDelete'])->name('markDelete');
Route::post('/markUpdateRoute/{id}', [TodoListController::class, 'markUpdate'])->name('markUpdate');
