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

Route::prefix('admin')->group(function () {
	Route::get('/', 'AdminController@index')->name('admin');
	Route::get('/categories', 'CategoryController@index')->name('category.index');
	Route::get('/categories/create', 'CategoryController@create')->name('category.create');
});


Route::get('logout', 'Auth\LoginController@logout')->name('logout');
