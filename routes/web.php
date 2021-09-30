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

Route::get('/', 'HomeController@home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/home/sort_new', 'HomeController@sort_new');
    Route::get('/home/sort_rank', 'HomeController@sort_rank');
    
    Route::get('books/create', 'Admin\CreateController@add');
    Route::post('books/create', 'Admin\CreateController@create');
    
    Route::get('books/deta', 'Admin\DetaController@index');
    
    Route::get('books/edit', 'Admin\EditController@edit');
    Route::post('books/edit', 'Admin\EditController@update');
    
    Route::get('books/search', 'Admin\SearchController@add');
    Route::get('books/search', 'Admin\SearchController@index');
    Route::post('books/search', 'Admin\SearchController@index');
    Route::get('books/search/tag', 'Admin\SearchController@searchTag');
    Route::post('books/search/tag', 'Admin\SearchController@searchTag');
    
    Route::get('books/graph1', 'Admin\GraphController@index1');
    Route::get('books/graph2', 'Admin\GraphController@index2');
    Route::get('books/graph3', 'Admin\GraphController@index3');
    
    Route::get('books/custom', 'Admin\CustomController@index');
    Route::post('books/custom', 'Admin\CustomController@update');
});

Auth::routes();