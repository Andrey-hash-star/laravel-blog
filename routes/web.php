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

Route::get('/', 'PostController@index')->name('home');
Route::get('/account/{id}', 'AccountController@edit')->name('user.account.edit');
Route::put('/account/{id}', 'AccountController@update')->name('user.account.update');
Route::get('/article/{slug}', 'PostController@show')->name('posts.single');
Route::post('/comments/{slug}/{id}', 'CommentController@comment')->name('posts.comments')->middleware('auth');
Route::get('/category/{slug}', 'CategoryController@show')->name('categories.single');
Route::get('/tag/{slug}', 'TagController@show')->name('tags.single');
Route::get('/search', 'SearchController@index')->name('search');
Route::post('/newsletter', 'NewsletterController@store')->name('newsletter.email');
Route::match(['get', 'post'], '/send', 'ContactController@send')->name('send');


Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function(){
    Route::get('/', 'MainController@index')->name('admin.index');
    Route::get('/account/{id}', 'AccountController@edit')->name('account.edit');
    Route::put('/account/{id}', 'AccountController@update')->name('account.update');
    Route::resource('/users', 'UserController');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/tags', 'TagController');
    Route::resource('/posts', 'PostController');
    Route::get('/search', 'SearchController@index')->name('admin.search');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', 'UserController@create')->name('register.create');
    Route::post('/register', 'UserController@store')->name('register.store');
    Route::get('/login', 'UserController@loginForm')->name('login.create');
    Route::post('/login', 'UserController@login')->name('login');
});

Route::get('/logout', 'UserController@logout')->name('logout')->middleware('auth');
