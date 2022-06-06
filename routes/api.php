<?php

use App\Http\Controllers\API\DistributorController;
use App\Http\Controllers\API\RegisterController;
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

Route::controller(RegisterController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
});

//Route::post('/sanctum/token', function (Request $request) {
//    $request->validate([
//        'email' => 'required|email',
//        'password' => 'required',
//        'device_name' => 'required'
//    ]);
//
//    $user = User::where('email', $request->email)->first();
//
//    if (!$user || !Hash::check($request->password, $user->password)) {
//        throw ValidationException::withMessages([
//            'email' => ['As credenciais fornecidas estão incorretas.'],
//        ]);
//    }
//
//    return $user->createToken($request->device_name)->plainTextToken;
//
//});

Route::prefix('admin')->middleware('auth:sanctum')->group(function () {
    Route::resource('/distributors', DistributorController::class);
//    Route::get('/distributors/{distributor}', 'DistributorController@show');
//    Route::post('/distributors', 'DistributorController@store');
//    Route::put('/distributors/{distributor}', 'DistributorController@update');
//    Route::delete('/distributors/{distributor}', 'DistributorController@delete');

    Route::get('/movies', 'MovieController@index');
    Route::get('/movies/{movie}', 'MovieController@show');
    Route::post('/movies', 'MovieController@store');
    Route::put('/movies/{movie}', 'MovieController@update');
    Route::delete('/movies/{movie}', 'MovieController@delete');
});
