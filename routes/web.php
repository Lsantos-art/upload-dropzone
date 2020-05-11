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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/categories', 'CategoriesController@index')->name('categories');
Route::get('/categForm', 'CategoriesController@create')->name('categ.form');
Route::post('/categCreate', 'CategoriesController@store')->name('categ.store');
Route::get('/categEdit/{id}', 'CategoriesController@edit')->name('categ.edit');
Route::post('/categEdit', 'CategoriesController@update')->name('categ.update');
Route::get('/categDelete/{id}', 'CategoriesController@destroy')->name('categ.delete');

Route::get('/products', 'ProductsController@index')->name('products');
Route::get('/products/{id}', 'ProductsController@show')->name('product.show');
Route::get('/productForm', 'ProductsController@create')->name('products.form');
Route::post('/productStore', 'ProductsController@store')->name('products.store');


Route::get('dropzone', 'DropController@test')->name('test');
Route::post('teststore', 'DropController@store')->name('teststore');
Route::post('testdelete', 'DropController@delete')->name('testdelete');


