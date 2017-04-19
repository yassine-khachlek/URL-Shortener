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

foreach (Config::get('languages') as $language) {
    Route::group(['prefix' => $language['prefix'], 'as' => $language['as']], function () {
        Route::get('/', 'WelcomeController@index')->name('welcome');

        Auth::routes();

        /*
        * Auth routes that should be renamed
        */
        Route::post('/login', 'Auth\LoginController@login')->name('login.store');
        Route::post('/register', 'Auth\RegisterController@register')->name('register.store');
        Route::post('/password/reset', 'Auth\ResetPasswordController@reset')->name('password.reset.store');

        Route::get('/home', 'HomeController@index')->name('home');

        Route::group(['middleware' => 'auth'], function () {
            Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
                Route::get('/', 'UsersController@index')->name('index');
                Route::get('/{id}/edit', 'UsersController@edit')->name('edit');
                Route::patch('/{id}', 'UsersController@update')->name('update');
            });

            Route::group(['prefix' => 'urls', 'as' => 'urls.'], function () {
                Route::get('/', 'UrlsController@index')->name('index');
                Route::get('/create', 'UrlsController@create')->name('create');
                Route::post('/', 'UrlsController@store')->name('store');
                Route::delete('/{id}', 'UrlsController@destroy')->name('destroy');
            });

            Route::group(['prefix' => 'url-access-logs', 'as' => 'url-access-logs.'], function () {
                Route::get('/', 'UrlAccessLogsController@index')->name('index');
            });
        });
    });
}

/*
* Redirect url, available for everyone
*/
Route::group(['middleware' => 'url.access.log'], function () {
    Route::get('/{id}', 'UrlsController@redirect')->name('urls.redirect');
});
