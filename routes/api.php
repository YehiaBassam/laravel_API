<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/posts', 'api\postcontroller@index')->middleware('auth:api');
Route::get('/posts/{post}', 'api\postcontroller@show')->middleware('auth:api');
Route::post('/posts', 'api\postcontroller@store')->middleware('auth:api');