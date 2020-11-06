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

Route::any('/','IndexController@index')->name('index');
Route::any('/register','UserController@register')->name('register');
Route::any('/login','UserController@login')->name('login');
Route::any('/logout','UserController@logout')->name('logout');
Route::any('/dating','UserController@dating')->middleware('auth');

