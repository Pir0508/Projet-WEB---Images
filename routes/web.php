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

Route::get('language', 'UserController@changeLang')->name('language');
Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);

Route::get('/', function () {
    return view('home');
});

Auth::routes();
Route::group(['middleware' => 'auth'], function (){
    Route::resource('image', 'ImageController');
    Route::resource('user', 'UserController');
    Route::get('/home', 'UserController@index')->name('home');
    Route::post('/filterImg', 'ImageController@show');
});
