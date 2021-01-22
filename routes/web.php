<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/score', 'ScoreController@index')->name('score.index');
Route::get('/score/create', 'ScoreController@create')->name('score.create');
Route::post('/score', 'ScoreController@store')->name('score.store');
Route::get('/score/{score}', 'ScoreController@show')->name('score.show');

Auth::routes();
