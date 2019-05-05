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

Route::get('aboutus', 'SiteController@aboutus')->name('aboutus');
Route::get('contact', 'SiteController@contact')->name('contact');

Route::group(['prefix' => 'site', "name" => "site"], function() {

	Route::get('product/{id}', 'SiteController@product')->name("site.product");
	Route::get('post/{id}', 'SiteController@post')->name("site.post");
	Route::get("products", "SiteController@products")->name("site.products");

	Route::get("products/cat/{id}", "SiteController@category");
	Route::post("search", "SiteController@products")->name("site.search");
	Route::get("posts", "SiteController@posts")->name("site.posts");

	Route::post("feedbacksend", "SiteController@feedbackSend")->name("feedback.send");

	Route::get("external", "SiteController@external")->name("external");
});

Route::post('review/create/{id}', 'ReviewController@create')->name("review.create");

Auth::routes();

Route::group(['prefix' => 'cart', "name" => "cart"], function() {
	Route::get('/', 'CartController@index')->name("cart.index");
	Route::get("add/{id}", 'CartController@add')->name('cart.add');
	Route::get("remove/{id}", 'CartController@remove')->name('cart.remove');

});

Route::group(['prefix' => 'order', "name" => "order"], function() {
	Route::get('create', 'OrderController@create')->name("order.create");

});


Route::group(['prefix' => 'admin', 'middleware' => 'adminMid'], function() {
	Route::get('/', 'AdminController@index')->name('admin');


	Route::group(["prefix" => "tags"], function () {
		Route::get('/', 'TagController@index')->name('tag.index');

		Route::get('create', 'TagController@create')->name('tag.create');
		Route::post('create', 'TagController@create')->name("tag.create.post");

		Route::get('update/{id}', 'TagController@update')->name('tag.update');
		Route::post('update/{id}', 'TagController@update')->name("tag.update.post");

		Route::get('delete/{id}', 'TagController@delete')->name('tag.delete');
	});


	Route::group(["prefix" => "orders"], function () {
		Route::get('/', 'OrderController@index')->name('order.index');


		Route::get('update/{id}', 'OrderController@update')->name('order.update');
		Route::post('update/{id}', 'OrderController@update')->name("order.update.post");

		Route::get('delete/{id}', 'OrderController@delete')->name('order.delete');
	});


	Route::group(["prefix" => "reviews"], function () {
		Route::get('/', 'ReviewController@index')->name('review.index');


		Route::get('update/{id}', 'ReviewController@update')->name('review.update');
		Route::post('update/{id}', 'ReviewController@update')->name("review.update.post");

		Route::get('delete/{id}', 'ReviewController@delete')->name('review.delete');
	});


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
