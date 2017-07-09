<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function()
{
    Route::resource('/', 'Admin\AdminController');
    Route::resource('categories', 'Admin\CategoryController');
    Route::resource('adverts', 'Admin\AdvertController');

});