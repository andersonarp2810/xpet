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
    Route::get('pets', 'PetController@index')->name('pet.index');
    Route::post('pet', 'PetController@store')->name('pet.store');
    Route::post('pet/{pet}', 'PetController@update')->name('pet.update');
    Route::post('pet/{pet}/delete', 'PetController@destroy')->name('pet.delete');

    ##### PET PROFILE #####
    Route::get('pet/profile/{pet}', 'PetController@show')->name('pet.profile');
    Route::post('pet/profile/{pet}', 'PetController@addPhoto')->name('pet.addphoto');
    Route::post('pet/profile/{pet}/{photo}', 'PetController@destroyPhoto')->name('pet.destroyphoto');

    ##### USER PROFILE #####
    Route::post('user/{user}', 'UserController@update')->name('user.update');
    Route::get('user/{user}', 'UserController@edit')->name('user.edit');

    ##### PET SOLICITATION #####
    Route::post('solicitation', 'SolicitationController@store')->name('pet.solicitation');
    Route::get('solicitation/show', 'SolicitationController@show')->name('solicitation.show');
    Route::post('solicitation/update/{solicitation}', 'SolicitationController@update')->name('solicitation.update');

});

Route::group(['middleware' => 'auth'], function(){
    Route::get('user', 'UserController@index')->name('user.index');
    Route::post('user/{user}', 'UserController@update')->name('user.update');
});

Route::get('/', function () {return redirect('home');});

Route::get('image', function () {
    return view('pet.image'); 
});

Route::get('emobra', function(){
    return view('emobra');
});

Route::get('verificar/{code}', 'EmailVerificationController@verify')->name('email.verify');
Route::post('verificar/reenviar', 'EmailVerificationController@resend')->name('email.resend')->middleware('auth'); // tem que tar logado

Route::get('novasenha', 'PasswordResetController@forgot')->name('password.forgot');
Route::get('novaSenha/{token}', 'PasswordResetController@editPassword')->name('password.edit');
Route::post('novaSenha/redefinir/{passwordreset}', 'PasswordResetController@store')->name('password.store');
Route::post('novaSenha/enviarEmail', 'PasswordResetController@sendMail')->name('password.sendMail');

Route::get('termos', function(){
    return view('termos');
});