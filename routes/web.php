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


Route::get('product/{id}', 'FrontController@show')->name('show_product');

Route::get('category/{id}', 'FrontController@showCategory')->name('show_product_category');

Route::get('sales', 'FrontController@showSales')->name('show_product_sales');

Route::get('/', 'FrontController@index')->name('home');


Route::get('/product/create', 'ProductController@create');


Route::get('/admin', 'ProductController@index');


