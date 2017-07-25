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
Auth::routes();
Route::get('/', function () {
    return view('index');
});

Route::get('/lalunos','indexController@list_al');

//Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/users/logout', 'Auth\AdminLoginController@userlogout')->name('user.logout');

  Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/luser','AdminController@list_u');
    Route::get('/cadmat','AdminController@cad_mat');
    Route::get('/ladmin','AdminController@list_a');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
//Rota Aluno
    Route::get('/lalunos','AdminController@list_al');
    Route::get('/cad_aluno', 'AdminController@cad_al');

//Rota Bolsa

  });

  Route::get('/edita/{id}', 'AdminController@edit_al');
  Route::post('/editadoa/{id}', 'AdminController@editado_al');
  Route::get('/remove/{id}', 'AdminController@remove');
  Route::post('/adiciona_a', 'AdminController@adiciona_al');
  Route::post('/adiciona_m','AdminController@adiciona_m');
  Route::get('/tadmin/{id}', 'AdminController@tadmin');
  Route::get('/tuser/{id}', 'AdminController@tuser');
  Route::get('/atrb/{id}', 'AdminController@atrb');
  Route::post('/atrba/{id}', 'AdminController@atrb_a');


Route::prefix('user')->group(function() {
  Route::get('/login', 'Auth\UserLoginController@showLoginForm')->name('user.login');
  Route::post('/login', 'Auth\UserLoginController@login')->name('user.login.submit');
  Route::get('/', 'UserController@index')->name('user.dashboard');
  Route::get('/logout', 'Auth\UserLoginController@logout')->name('user.logout');
});
