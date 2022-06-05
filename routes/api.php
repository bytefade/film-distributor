<?php

use App\Models\Distributor;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('admin')->group(function () {
    Route::get('/distributors', 'DistributorController@index');
    Route::get('/distributors/{distributor}', 'DistributorController@show');
    Route::post('/distributors', 'DistributorController@store');
    Route::put('/distributors/{distributor}', 'DistributorController@update');
    Route::delete('/distributors/{distributor}', 'DistributorController@delete');

    Route::get('/movies', 'MovieController@index');
    Route::get('/movies/{movie}', 'MovieController@show');
    Route::post('/movies', 'MovieController@store');
    Route::put('/movies/{movie}', 'MovieController@update');
    Route::delete('/movies/{movie}', 'MovieController@delete');
});
