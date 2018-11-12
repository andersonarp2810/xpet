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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::post('login', 'Auth\LoginController@login')->name('login')->middleware('guest');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::post('register', 'Auth\RegisterController@register')->middleware('guest');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register')->middleware('guest');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/pet', 'PetController')->middleware('auth');

Route::get('profile', function(){
    return view('user.profile');
});