<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;

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
Route::get('/', [UserController::class, 'welcome']);
Route::get('add-user-form', [UserController::class, 'index']);
Route::post('register-form', [UserController::class, 'insertUser']);
Route::get('add-category', [CategoryController::class, 'addCategory']);
Route::post('insert-category', [CategoryController::class, 'insertCategory']);
