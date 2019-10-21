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

Route::get('/', 'CrudGenerate@generate')->name('crudg');

Route::get('/crud', 'crud@generate')->name('crud');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
