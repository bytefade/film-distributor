<?php

use App\Http\Controllers\API\DistributorController;
use App\Http\Controllers\API\MovieController;
use App\Http\Controllers\API\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(RegisterController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::prefix('admin')->middleware('auth:sanctum')->group(function () {
    Route::resource('/distributors', DistributorController::class);
    Route::resource('/movies', MovieController::class);
});
