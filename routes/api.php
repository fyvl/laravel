<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PersonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [AuthController::class, 'user']);
    Route::post('logout', [AuthController::class, 'logout']);
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::get('news', [NewsController::class, 'index']);
Route::post('formSubmit',[NewsController::class, 'formSubmit']);
Route::delete('news/{id}', [NewsController::class, 'destroy']);
Route::get('news/{id}', [NewsController::class, 'goToID']);

Route::get('departments', [DepartmentController::class, 'index']);

Route::get('live-search', [PersonController::class, 'getPeople']);
