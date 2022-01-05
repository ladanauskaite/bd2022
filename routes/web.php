<?php

Route::group(['namespace' => 'User'], function(){

Route::get('/', 'PaslaugosController@index')->name('paslauga');

Route::get('karjera', 'SkelbimoController@index')->name('skelbimas');

Route::get('naujienos', 'NaujienosController@index')->name('naujienos');

Route::get('treniruotes', 'TreniruotesController@index')->name('treniruotes');

Route::get('tvarkarastis/{sportoklubopavadinimas}', 'TvarkarascioController@index')->name('example');

Route::get('tvarkarastis', 'TvarkarascioController@index')->name('example1');

Route::get('kainorastis', 'KainosController@index')->name('kainos');

Route::post('tvarkarastis', 'TvarkarascioController@store')->name('user_rezervacija');

Route::get('paskyra', 'PaskyrosController@index')->name('paskyra');

Route::get('live', 'LiveController@index')->name('user_live_rezervacija');

Route::get('live/{id}', 'LiveController@live')->name('exm_live');

Route::post('live', 'LiveController@store')->name('user_live_rezervacija_store');

});


Route::get('admin/home', 'Admin\HomeController@index');

Route::resource('admin/paslaugos', 'Admin\PaslaugosController');  

Route::resource('admin/sales', 'Admin\SalesController');  

Route::resource('admin/sportoklubai', 'Admin\SportoKluboController');  

Route::resource('admin/treniruotes', 'Admin\TreniruotesController');  

Route::resource('admin/rezervacijos', 'Admin\RezervacijosController'); 

Route::resource('admin/live-rezervacijos', 'Admin\LiveRezervacijosController'); 

Route::resource('admin/user-rezervacijos', 'Admin\UserRezervacijosController');

Route::resource('admin/user-live-rezervacijos', 'Admin\UserLiveRezervacijosController');

Route::resource('admin/klientai', 'Admin\KlientoController');  

Route::resource('admin/administratoriai', 'Admin\AdminController');  
  
Route::resource('admin/kainorastis', 'Admin\KainosController'); 

Route::resource('admin/naujienos', 'Admin\NaujienosController'); 

Route::resource('admin/skelbimai', 'Admin\SkelbimoController'); 

Route:: get('admin-login','Admin\Auth\AdminLoginController@showLoginForm')->name('admin.login');

Route:: post('admin-login','Admin\Auth\AdminLoginController@login');

Route:: get('admin-register', 'Admin\Auth\RegisterController@showRegisterForm')->name('admin.register');

Route:: resource('admin-register', 'Admin\Auth\AdminRegisterController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
