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

Route::get('/', 'ArticleController@index')->name('index');
Route::get('/create', 'ArticleController@create')->name('create');
Route::post('/', 'ArticleController@store')->name('store');
Route::get('/{id}', 'ArticleController@show')->name('show');
Route::get('/{id}/edit', 'ArticleController@edit')->name('edit');
Route::put('/{id}', 'ArticleController@update')->name('update');
Route::delete('/{id}', 'ArticleController@destroy')->name('destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
