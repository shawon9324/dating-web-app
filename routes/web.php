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
Route::any('update-like-status', 'UserController@updateLikeStatus');

Route::get('/','IndexController@index')->name('index');
Route::any('/register','UserController@register')->name('register');
Route::any('/login','UserController@login')->name('login');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/logout','UserController@logout')->name('logout');
    Route::any('/dating','UserController@dating')->name('dating');

    Route::match(['get','post'],'/dating/image-upload','UserController@imageUp')->name('image-up');

});

