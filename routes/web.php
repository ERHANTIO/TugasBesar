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

Route::get('/','StuffController@welcome');
Auth::routes();

Route::get('/page', 'HomeController@index')->name('Welcome');
Route::resource("users", "UserController");

Route::delete('/categories/{id}/delete-permanent', 'CategoryController@deletePermanent')->name('categories.delete-permanent'); 
Route::get('/categories/{id}/restore', 'CategoryController@restore')->name('categories.restore'); 
Route::get('/categories/trash', 'CategoryController@trash')->name('categories.trash'); 
Route::resource('categories', 'CategoryController'); 

Route::delete('/brands/{id}/delete-permanent', 'BrandController@deletePermanent')->name('brands.delete-permanent'); 
Route::get('/brands/{id}/restore', 'BrandController@restore')->name('brands.restore'); 
Route::get('/brands/trash', 'BrandController@trash')->name('brands.trash'); 
Route::resource('brands', 'BrandController'); 

Route::delete('/stuffs/{id}/delete-permanent', 'StuffController@deletePermanent')->name('stuffs.delete-permanent'); 
Route::post('/stuffs/{id}/restore', 'StuffController@restore')->name('stuffs.restore'); 
Route::get('/stuffs/trash', 'StuffController@trash')->name('stuffs.trash'); 
Route::resource('stuffs', 'StuffController'); 

Route::resource('stuffs', 'StuffController');