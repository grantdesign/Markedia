<?php

use Illuminate\Support\Facades\Route;

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

/* Route Public */

Route::get('/', 'PostController@index')->name('home');

Route::get('/article/{slug}', 'PostController@show')->name('posts.single');
Route::post('/article/{slug}', 'PostController@store')->name('comment.store');

Route::get('/category/{slug}', 'CategoryController@show')->name('categories.single');

Route::get('/tag/{slug}', 'TagController@show')->name('tags.single');

Route::get('/search', 'SearchController@index')->name('search');

Route::match(['get', 'post'], '/contacts', 'ContactController@index')->name('contacts');

Route::post('/subscribe', 'SubscribeCotroller@store')->name('subscribe');

/* Route User */

Route::group(['middleware' => 'guest'], function() {

	Route::get('/register', 'UserController@create')->name('register.create');
	Route::post('/register', 'UserController@store')->name('register.store');
	
	Route::get('/login', 'UserController@loginForm')->name('login.create');
	Route::post('/login', 'UserController@login')->name('login');

});

Route::group(['middleware' => 'auth'], function() {

	Route::get('/profile', 'UserController@profile')->name('profile');
	Route::post('/profile', 'UserController@update')->name('profile.update');
	Route::get('/logout', 'UserController@logout')->name('logout');

});

/* Route Admin */

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function() {

	Route::get('/', 'MainController@index')->name('admin.index');
	
	Route::resource('/categories', 'CategoryController');

	Route::resource('/tags', 'TagController');

	Route::resource('/posts', 'PostController');

	Route::match(['get', 'post', 'delete'], '/users', 'UserController@index')->name('users.index');

	Route::resource('/comments', 'CommentController');

});