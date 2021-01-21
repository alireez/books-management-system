<?php

use Illuminate\Support\Facades\App;
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

Route::get('/','PageController@index')->name('pages');

Route::get('/blog/create','PageController@create')->name('create.book');
Route::get('/blog/edit/{id}','PageController@edit')->name('edit.book');
Route::put('/blog/edit/update/{id}','PageController@update')->name('update.book');

Route::get('/blog/{id}','PageController@show');
Route::post('/post' ,'PageController@store')->name('pages.store');

Route::get('/categories','PageController@category')->name('category');
Route::get('/category','PageController@categories')->name('categories');
Route::post('/category/store','PageController@StoreCategories')->name('category.store');
Route::get('/category/{id}','PageController@EditCategory')->name('category.edit');
Route::put('/category/edit/update/{id}','PageController@UpdateCategory')->name('update.category');

Route::post('/comment/{id}','PageController@StoreComment')->name('comment.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
