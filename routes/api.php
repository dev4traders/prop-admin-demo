<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Auth\RegisterController;
use \App\Http\Controllers\Auth\AuthController;
use \App\Http\Controllers\Auth\VerificationEmailController;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::middleware('auth:sanctum')->group(function () {

});
Route::middleware(['guest'])->prefix('v1')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('login', 'login')->name('login');
        Route::post('logout', 'logout');
        Route::post('reset-password', 'resetPassword');
    });
    Route::post('register', [RegisterController::class, 'register']);

    Route::get(
        '/email/verify/{id}/{hash}',
        [VerificationEmailController::class, 'verify']
    )->name('verification.verify');
    Route::post('email/resend', [VerificationEmailController::class, 'resend']);

});
