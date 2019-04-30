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



Route::get('/', 'SiteController@welcome')->name('welcome');


Auth::routes();

Route::group(['prefix' => 'cart', "name" => "cart"], function() {
	Route::get('/', 'CartController@index')->name("cart.index");
	Route::get("add/{id}", 'CartController@add')->name('cart.add');
	Route::get("remove/{id}", 'CartController@remove')->name('cart.remove');


});

Route::group(['prefix' => 'admin'], function() {
	Route::get('/', 'AdminController@index')->name('admin');


	Route::group(["prefix" => "sliders"], function () {
		Route::get('/', 'SliderController@index')->name('slider.index');

		Route::get('create', 'SliderController@create')->name('slider.create');
		Route::post('create', 'SliderController@create')->name("slider.create.post");

		Route::get('update/{id}', 'SliderController@update')->name('slider.update');
		Route::post('update/{id}', 'SliderController@update')->name("slider.update.post");

		Route::get('delete/{id}', 'SliderController@delete')->name('slider.delete');
	});


	Route::group(["prefix" => "categories"], function () {
		Route::get('/', 'CategoryController@index')->name('category.index');

		Route::get('create', 'CategoryController@create')->name('category.create');
		Route::post('create', 'CategoryController@create')->name("category.create.post");

		Route::get('update/{id}', 'CategoryController@update')->name('category.update');
		Route::post('update/{id}', 'CategoryController@update')->name("category.update.post");

		Route::get('delete/{id}', 'CategoryController@delete')->name('category.delete');
	});

	Route::group(["prefix" => "products"], function () {
		Route::get('/', 'ProductController@index')->name('product.index');

		Route::get('create', 'ProductController@create')->name('product.create');
		Route::post('create', 'ProductController@create')->name("product.create.post");

		Route::get('update/{id}', 'ProductController@update')->name('product.update');
		Route::post('update/{id}', 'ProductController@update')->name("product.update.post");

		Route::get('delete/{id}', 'ProductController@delete')->name('product.delete');
	});

});




Route::get('logout', 'Auth\LoginController@logout')->name('logout');
