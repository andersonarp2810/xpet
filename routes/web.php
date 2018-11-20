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

//Route::resource('/pet', 'PetController')->middleware('auth');

Route::group(['middleware' => 'auth'], function(){
    Route::get('pet', 'PetController@index')->name('pet.index');
    Route::post('pet', 'PetController@store')->name('pet.store');
    Route::post('pet/{pet}', 'PetController@update')->name('pet.update');

    ##### PET PROFILE #####
    Route::get('pet/profile/{pet}', 'PetController@show')->name('pet.profile');
    Route::get('pet/foto/{pet}', 'PetController@addPhoto');

});

Route::group(['middleware' => 'auth'], function(){
    Route::get('user', 'UserController@index')->name('user.index');
    Route::post('user/{user}', 'UserController@update')->name('user.update');
});

Route::get('/', function () {return redirect('home');});

Route::get('aaa', function () {
    dd(new App\Pet());
    return redirect('home'); 
});

Route::get('image', function () {
    return view('pet.image'); 
});
