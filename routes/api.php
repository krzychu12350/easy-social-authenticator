<?php

use App\Http\Controllers\LoginController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => 'web'], function(){

});

Route::get('auth/github', [LoginController::class, 'redirectToGithub']);
Route::post('auth/github/callback', [LoginController::class, 'handleGithubCallback']);

Route::get('auth/google', [LoginController::class, 'redirectToGoogle']);
Route::post('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);
//Route::get('auth/google/callbackk', [LoginController::class, 'handleGoogleCallbackk']);
