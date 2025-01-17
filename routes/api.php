<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserApiController;
use App\Http\Controllers\PublishersController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\PaystackController;
use App\Http\Controllers\TagController;

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

Route::post('/paystack-events', [PaystackController::class, 'events']);
Route::post('/paystack-events/check', [PaystackController::class, 'checkEvent']);
Route::group(['middleware' => ['listener-api-check']], function () {
    Route::post('/signup', [AuthController::class, 'signup']);
    Route::post('/send-otp', [AuthController::class, 'sendOTP']);
    Route::post('/verify-otp', [AuthController::class, 'verifyOTP']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('forgot-password', [AuthController::class, 'sendPasswordResetOTP']);
    Route::post('check-password-reset-token', [AuthController::class, 'checkPasswordResetToken']);
    Route::post('reset-password', [AuthController::class, 'resetPassword']);
    // Route::get('/update-user', [UserApiController::class, 'updateUser']);
    // Route::get('/fetch-users', [UserApiController::class, 'fetchUsers']);
    
});



Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::group(['prefix' => 'publishers'], function () {
        Route::get('/', [PublishersController::class, 'get']);
        Route::post('select', [PublishersController::class, 'select']);
        Route::post('toggle-follow', [PublishersController::class, 'toggleFollow']);
        Route::get('/trending', [PublishersController::class, 'getTrendingPublishers']);
        Route::get('/{id}', [PublishersController::class, 'getPublisherData']);
    });

    Route::group(['prefix' => 'files'], function () {
        Route::post('/', [FileController::class, 'getFiles']);
        Route::post('/play', [FileController::class, 'play']);
        Route::post('/toggle-favourites', [FileController::class, 'toggleFavourites']);
        Route::get('/{slug}', [FileController::class, 'getSingleFile']);
        Route::post('/listens', [FileController::class, 'listenedfiles']);
        Route::post('/search', [FileController::class, 'search']);
    });

    Route::group(['prefix' => 'tags'], function () {
        Route::get('/', [TagController::class, 'all']);
        Route::post('/publisher-tags', [TagController::class, 'getPublisherTags']);
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/self', [UserApiController::class, 'getDetail']);
        Route::post('/update', [UserApiController::class, 'updateDetail']);
        Route::post('/upload-profile-photo', [UserApiController::class, 'uploadProfilePhoto']);

    });
    
});



Route::get('/user', function (Request $request) {
    return $request->user();
});



