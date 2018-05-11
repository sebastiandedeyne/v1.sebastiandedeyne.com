<?php

Route::feeds();

Route::get('/', 'HomeController@index')->name('home');

Route::view('/about', 'about.index')->name('about');

Route::get('/posts', 'PostsController@index')->name('posts');
Route::get('/posts/{year}/{slug}', 'PostsController@redirectOldPost');
Route::get('/posts/{slug}', 'PostsController@show')->name('posts.show')->where('slug', '(.*)');
