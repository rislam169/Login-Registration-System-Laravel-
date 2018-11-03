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

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function () {
	return view('about');
});

Route::get('index','showdataController@index');
Route::get('profile/{id}','showdataController@show');
Route::get('login','showdataController@login');
Route::get('adminLogin','showdataController@adminLogin');
Route::get('logout','showdataController@logout');
Route::get('register','showdataController@register');
Route::get('changepass','showdataController@changepass');
Route::get('addAdmin','showdataController@addAdmin');
Route::get('removeAccount', 'RegisterController@removeAccount');

Route::post('regs', 'RegisterController@regs');
Route::post('adminregs', 'RegisterController@adminregs');
Route::post('logs', 'loginController@logs');
Route::post('adminlogs', 'loginController@adminlogs');
Route::post('update', 'updateController@update');
Route::post('updatepass', 'updateController@updatepass');
Route::get('delprofile/{id}','updateController@delprofile');


