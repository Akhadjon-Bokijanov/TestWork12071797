<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\BlogController;
use \App\Http\Controllers\UserController;

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

Route::group(["middleware"=>["auth:api"]], function (){
    Route::apiResource('users', UserController::class);
    Route::apiResource('blogs', BlogController::class);
});

Route::post("login", '\App\Http\Controllers\LoginController@login')->name('users.login');
Route::post("register", "\App\Http\Controllers\UserController@store")->name("users.register");

