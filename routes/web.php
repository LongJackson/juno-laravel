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

// Route::get('/', function () {
//     return view('backend.admin.index');
// });


Route::group(['prefix' => '/'], function(){
	Route::get('', 'FrontendController@index')->name('index');
	Route::get('/test', 'FrontendController@test');
	Route::get('san-pham/{slug}.html', 'FrontendController@detail')->name('detail');
	Route::get('chuyen-muc/{slug}.html', 'FrontendController@category')->name('front_cate');
	Route::get('tim-kiem.html', 'FrontendController@search')->name('search');
	Route::get('slide', 'FrontendController@loadslide');
	Route::post('comment/{id}', 'FrontendController@comment')->name('add-comment');
	Route::group(['prefix' => 'cart'], function(){
		Route::get('/', 'CartController@cart')->name('cart');
		Route::get('add', 'CartController@cart');
		Route::get('pay', 'CartController@pay')->name('pay');
		Route::post('pay', 'CartController@checkout');
		Route::post('add-cart', 'CartController@addTocart')->name('add-to-cart');
		Route::get('del/{id}', 'CartController@delete')->name('cart-delete');
		Route::get('delall', 'CartController@destroy')->name('cart-destroy');
	});
});

Route::group(['prefix' => 'admin','namespace' =>'Backend'], function(){
	Route::get('/login', 'LoginController@getLogin')->middleware('CheckLogin')->name('login');
	Route::post('/login', 'LoginController@postLogin');
	Route::get('/logout', 'LoginController@logout')->name('logout');
	Route::group(['prefix' => '/', 'middleware' => ['CheckLogout']], function() {
		Route::get('/', 'AdminController@index')->name('admin');

		Route::group(['prefix' => 'user'], function(){
			Route::get('/', 'Admincontroller@list')->name('user');
			Route::get('/delete/{id}', 'Admincontroller@destroy')->name('del-user')->middleware('can:del-user,id');
			Route::get('/edit/{id}', 'Admincontroller@edit')->name('edit-user')->middleware('can:upadte-user,id');
			Route::post('/edit/{id}', 'Admincontroller@update');
		});

		Route::group(['prefix' => 'product'], function(){
			Route::get('/', 'ProductController@list')->name('product');
			Route::get('/edit/{id}', 'ProductController@edit')->name('edit-product')->middleware('can:update-prod');
			Route::post('/edit/{id}', 'ProductController@update');
			Route::post('/update/{id}', 'ProductController@updateItem')->name('update-item');
			Route::get('/add', 'ProductController@create')->name('add-product');
			Route::post('/add', 'ProductController@store');
			Route::get('/del/{id}', 'ProductController@destroy')->name('del-product');
		});


		Route::group(['prefix' => 'category'], function(){
			Route::get('/', 'CategoryController@index')->name('cate');
			Route::get('/add', 'CategoryController@create')->name('create-cate');
			Route::post('/add', 'CategoryController@store');
			Route::get('/edit/{id}', 'CategoryController@edit')->name('edit-cate');
			Route::post('/edit/{id}', 'CategoryController@update');
			Route::get('/delete/{id}', 'CategoryController@destroy')->name('del-cate');

		});


		Route::group(['prefix' => 'attribute'], function(){
			Route::get('/', 'AttributeController@index')->name('attribute');
			Route::get('/add', 'AttributeController@create')->name('create-attr');
			Route::post('/add', 'AttributeController@store');
			Route::get('/edit/{id}', 'AttributeController@edit')->name('edit-attr');
			Route::post('/edit/{id}', 'AttributeController@update');
			Route::get('/del/{id}', 'AttributeController@destroy')->name('del-attr');
			Route::get('/delvalue/{id}', 'AttributeController@destroyValue')->name('del-value');
		});


		Route::group(['prefix' => 'gallery'], function(){
			Route::get('/', 'ImageController@index')->name('gallery');
			Route::get('/upload', 'ImageController@formupload')->name('form-upload');
			Route::get('/image', 'ImageController@image')->name('image');
			Route::post('/image', 'ImageController@store')->name('upload');
		});

		Route::group(['prefix' => 'order'], function(){
			Route::get('/', 'OrderController@index')->name('order');
			Route::get('delete/{id}', 'OrderController@destroy')->name('del-order');
			Route::get('edit/{id}', 'OrderController@edit')->name('edit-order');
			Route::post('edit/{id}', 'OrderController@update');
		});

		Route::group(['prefix' => 'comment'], function(){
			Route::get('/', 'CommentController@index')->name('comment');
			Route::get('edit/{id}', 'CommentController@edit')->name('edit-comment');
			Route::get('delete/{id}', 'CommentController@destroy')->name('del-comment');
			Route::post('edit/{id}', 'CommentController@update');
		});
		
	});
});
