<?php

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

Route::post('login', '\App\Http\Controllers\HomeController@login');
Route::post('signup', '\App\Http\Controllers\HomeController@login');

Route::get('products', '\App\Http\Controllers\HomeController@products');
Route::get('clubs', '\App\Http\Controllers\HomeController@clubs');
Route::get('category', '\App\Http\Controllers\HomeController@category');
Route::get('country', '\App\Http\Controllers\HomeController@country');
Route::get('state/{country_id}', '\App\Http\Controllers\HomeController@state');
Route::get('city/{state_id}', '\App\Http\Controllers\HomeController@city');