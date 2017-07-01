<?php

Route::feeds();

Route::get('/', 'HomeController')->name('home');
Route::get('/about', 'AboutController');
Route::get('/open-source', 'OpenSourceController');
Route::get('/blogroll', 'BlogrollController');

Route::get('/posts', 'BlogController@index');
Route::get('/posts/page/{page}', 'BlogController@page');
Route::get('/posts/{slug}', 'BlogController@post')->where('slug', '(.*)');
