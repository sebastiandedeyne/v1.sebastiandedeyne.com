<?php

Route::feeds();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/about', 'AboutController@index')->name('about');

Route::get('/open-source', 'OpenSourceController@index')->name('openSource');

Route::get('/blogroll', 'BlogrollController@index')->name('blogroll');

Route::get('/posts', 'PostsController@index')->name('posts.index');
Route::get('/posts/page/{page}', 'PostsController@page');
Route::get('/posts/{year}/{slug}', 'PostsController@show')->name('posts.show')->where('slug', '(.*)');
