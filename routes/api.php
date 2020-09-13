<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('feedback', 'FeedbackController@index');
Route::get('feedback/{id}', 'FeedbackController@show');
Route::post('feedback', 'FeedbackController@store');
Route::put('feedback/{id}', 'FeedbackController@update');
Route::delete('feedback/{id}', 'FeedbackController@delete');
