<?php

Auth::routes();

Route::post('/addComment', 'HomeController@addComment')->name('addComment');
Route::get('/delComment/{id}', 'AdminController@delComment')->name('delComment');
Route::get('/users', 'AdminController@users')->name('users');
Route::post('/block', 'AdminController@block')->name('block');
Route::get('/{myCom?}', 'HomeController@index')->name('home');