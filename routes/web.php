<?php

Route::feeds();

Route::get('/test', 'HomeController@test');

Route::get('/', 'HomeController@index')->name('home');

Route::view('/about', 'about.index')->name('about');

Route::get('/posts', 'PostsController@index')->name('posts.index');
Route::get('/posts/{slug}', 'PostsController@show')->name('posts.show')->where('slug', '(.*)');
