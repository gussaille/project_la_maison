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


Route::get('/product/create', 'ProductController@create')->name('product.create');

Route::get('/product/{id}/edit', 'ProductController@edit')->name('product.edit');

Route::put('/product/{id}', 'ProductController@update')->name('product.update');

Route::post('/product', 'ProductController@store')->name('product.store');

Route::delete('/product/{id}', 'ProductController@destroy')->name('product.destroy');

Route::get('/admin', 'ProductController@index')->name('product.index');



Route::get('/product/{id}', 'FrontController@show')->name('show_product');

Route::get('/category/{id}', 'FrontController@showCategory')->name('show_product_category');

Route::get('/sales', 'FrontController@showSales')->name('product.sales');

Route::get('/', 'FrontController@index')->name('home');






