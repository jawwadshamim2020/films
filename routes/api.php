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
//php artisan serve --port 8001
#all films
Route::get('films', 'Api\FilmController@getFilms')->name('films');
#film detail
Route::get('film/{slug}', 'Api\FilmController@getFilmDetail')->name('film');

