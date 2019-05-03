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



Route::get('/', 'SiteController@index')->name('index');

Route::group(['prefix' => 'site', "name" => "site"], function() {
	Route::get('product/{id}', 'SiteController@product')->name("site.product");
	Route::get('post/{id}', 'SiteController@post')->name("site.post");
});


Auth::routes();

Route::group(['prefix' => 'cart', "name" => "cart"], function() {
	Route::get('/', 'CartController@index')->name("cart.index");
	Route::get("add/{id}", 'CartController@add')->name('cart.add');
	Route::get("remove/{id}", 'CartController@remove')->name('cart.remove');

});

Route::group(['prefix' => 'admin'], function() {
	Route::get('/', 'AdminController@index')->name('admin');

	Route::group(["prefix" => "posts"], function () {
		Route::get('/', 'PostController@index')->name('post.index');

		Route::get('create', 'PostController@create')->name('post.create');
		Route::post('create', 'PostController@create')->name("post.create.post");

		Route::get('update/{id}', 'PostController@update')->name('post.update');
		Route::post('update/{id}', 'PostController@update')->name("post.update.post");

		Route::get('delete/{id}', 'PostController@delete')->name('post.delete');
	});


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
