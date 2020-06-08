<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

    Route::get('product-list', 'ProductController@index')->name('products');
    Route::get('product-create', 'ProductController@create')->name('product.create');
    Route::post('product-store', 'ProductController@store')->name('product.store');
    Route::get('product-edit/{id}', 'ProductController@edit')->name('product.edit');
    Route::post('product-update/{id}', 'ProductController@update')->name('product.update');
    Route::get('product-destroy/{id}', 'ProductController@destroy')->name('product.destroy');

    Route::get('category-list', 'CategoryController@index')->name('categorys');
    Route::get('category-create', 'CategoryController@create')->name('category.create');
    Route::post('category-store', 'CategoryController@store')->name('category.store');
    Route::get('category-edit/{id}', 'CategoryController@edit')->name('category.edit');
    Route::post('category-update/{id}', 'CategoryController@update')->name('category.update');
    Route::get('category-destroy/{id}', 'CategoryController@destroy')->name('category.destroy');
});

