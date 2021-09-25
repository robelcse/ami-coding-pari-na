<?php


Route::get('/','FrontendController@index')->name('home');
Route::get('/signin', 'FrontendController@signin')->name('signin');
Route::get('/signup', 'FrontendController@signup')->name('signup');

 