<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

#create films
Route::get('films/create', 'FilmController@createFrom')->name('film.create.from');
Route::post('films/create', 'FilmController@create')->name('film.create');

#films list
Route::get('/', 'FilmController@index')->name('films');
Route::get('films', 'FilmController@index')->name('films');
Route::get('films-data', 'FilmController@filmsList')->name('film.data');

#film detail
Route::get('films/{slug}', 'FilmController@filmDetail')->name('film-detail');

#add comment
Route::post('add-comment', 'CommentController@add')->name('add.comment');


