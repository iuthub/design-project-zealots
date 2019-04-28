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

Route::group(['prefix' => 'admin'], function() {
	Route::get('/', 'AdminController@index')->name('admin');

	Route::group(["prefix" => "categories"], function () {
		Route::get('/', 'CategoryController@index')->name('category.index');

		Route::get('create', 'CategoryController@create')->name('category.create');
		Route::post('create', 'CategoryController@create')->name("category.create.post");

		Route::get('update/{id}', 'CategoryController@update')->name('category.update');
		Route::post('update/{id}', 'CategoryController@update')->name("category.update.post");

		Route::get('delete/{id}', 'CategoryController@delete')->name('category.delete');
	});

});




Route::get('logout', 'Auth\LoginController@logout')->name('logout');
