<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\creators\AuthController as CreatorAuthController;
use App\Http\Controllers\UserApiController;
use App\Http\Controllers\PublishersController;
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

Route::group(['middleware' => ['listener-api-check']], function () {
    Route::post('/signup', [AuthController::class, 'signup']);
    Route::post('/send-otp', [AuthController::class, 'sendOTP']);
    Route::post('/verify-otp', [AuthController::class, 'verifyOTP']);
    Route::post('/login', [AuthController::class, 'login']);
    // Route::get('/update-user', [UserApiController::class, 'updateUser']);
    // Route::get('/fetch-users', [UserApiController::class, 'fetchUsers']);
    
});



Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::group(['prefix' => 'publishers'], function () {
        Route::get('/', [PublishersController::class, 'get']);
    });
});



Route::group(['prefix' => 'creator', 'middleware' => ['creator-api-check']], function () {
    Route::post('signup', [CreatorAuthController::class, 'signup']);
    // Route::post('send-consultant-reglink', 'AdminController@sendConsultantRegLink')->name('send-consultant-reglink');
});


Route::get('/user', function (Request $request) {
    return $request->user();
});



