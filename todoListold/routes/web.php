<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoListController;

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

Route::get('/', [TodoListController::class, 'index']);

Route::post('/saveItemRoute', [TodoListController::class, 'saveItem'])->name('saveItem');
Route::post('/markCompleteRoute/{id}', [TodoListController::class, 'markComplete'])->name('markComplete');
Route::post('/markDeleteRoute/{id}', [TodoListController::class, 'markDelete'])->name('markDelete');
Route::post('/markUpdateRoute/{id}', [TodoListController::class, 'markUpdate'])->name('markUpdate');
