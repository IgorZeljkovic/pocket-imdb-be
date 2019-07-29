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

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', 'Auth\AuthController@login');
    Route::post('logout', 'Auth\AuthController@logout');
    Route::post('refresh', 'Auth\AuthController@refresh');
    Route::post('me', 'Auth\AuthController@me');
    Route::post('register', 'Auth\RegisterController@create');
});

Route::apiResource('movies', 'Api\MovieController');

Route::post('movies/{movie}/vote/{type}', 'Api\MovieVoteController@store')
        ->where('type', 'like|dislike');
Route::delete('movies/{movie}/vote/{type}', 'Api\MovieVoteController@destroy');
Route::put('movies/{movie}/vote/{type}', 'Api\MovieVoteController@update');

Route::post('movies/{movie}/visit', 'Api\MovieController@visit');

Route::apiResource('genres', 'Api\GenreController')->only('index');
