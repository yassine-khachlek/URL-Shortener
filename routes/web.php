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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

	Route::group(['prefix' => 'users', 'as' => 'users.'], function () {

		Route::get('/{id}/edit', 'UsersController@edit')->name('edit');
		Route::patch('/{id}', 'UsersController@update')->name('update');

	});

	Route::group(['prefix' => 'urls', 'as' => 'urls.'], function () {

		Route::get('/', 'UrlsController@index')->name('index');
		Route::get('/create', 'UrlsController@create')->name('create');
		Route::post('/', 'UrlsController@store')->name('store');
		Route::delete('/{id}', 'UrlsController@destroy')->name('destroy');

	});

});

/**
* Redirect url, available for everyone
*/
Route::group(['middleware' => 'url.access.log'], function () {
	Route::get('/{id}', 'UrlsController@redirect')->name('urls.redirect');
});
