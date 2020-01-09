<?php

Route::group(['namespace' => 'User'], function(){

Route::get('/', 'PaslaugosController@index')->name('paslauga');

Route::get('karjera', 'SkelbimoController@index')->name('skelbimas');

Route::get('naujienos', 'NaujienosController@index');

Route::get('tvarkarastis', 'TvarkarascioController@index');

Route::get('kainorastis', 'KainosController@index');

});


Route::get('admin/home', 'Admin\HomeController@index');

Route::resource('admin/paslaugos', 'Admin\PaslaugosController');     

Route::resource('admin/klientai', 'Admin\KlientoController');  

Route::resource('admin/administratoriai', 'Admin\AdminController');  
  
Route::resource('admin/kainorastis', 'Admin\KainosController'); 

Route::resource('admin/tvarkarastis', 'Admin\TvarkarascioController');

Route::resource('admin/naujienos', 'Admin\NaujienosController'); 

Route::resource('admin/skelbimai', 'Admin\SkelbimoController'); 

Route:: get('admin-login','Admin\Auth\AdminLoginController@showLoginForm')->name('admin.login');

Route:: post('admin-login','Admin\Auth\AdminLoginController@login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


