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

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/users/logout', 'Auth\AdminLoginController@userlogout')->name('user.logout');

  Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/luser','AdminController@list_u');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
  });
Route::get('/tadmin/{id}', 'AdminController@tadmin');
Route::post('/tu/{id}', 'AdminController@tadmin_u');
