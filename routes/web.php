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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('books/create', 'Admin\CreateController@add');
    Route::post('books/create', 'Admin\CreateController@create');
    Route::get('books/deta', 'Admin\DetaController@add');
    Route::get('books/edit', 'Admin\EditController@edit');
    Route::post('books/edit', 'Admin\EditController@update');
    Route::get('books/search', 'Admin\SearchController@add');
    Route::get('books/search', 'Admin\SearchController@index');
    Route::post('books/search', 'Admin\SearchController@index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
