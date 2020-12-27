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


Route::group(['namespace' => 'Students'], function () {
    // route::get('trang-chu', 'HomeController@index')->name('home.page');
    route::get('/', 'HomeController@index')->name('home.page');
});
