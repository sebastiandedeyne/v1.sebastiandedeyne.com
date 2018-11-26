<?php

Route::feeds();

Route::get('/', 'HomeController@index')->name('home');

Route::view('about', 'about.index')->name('about');

Route::view('privacy', 'privacy.index')->name('privacy');

Route::get('posts', 'PostsController@redirectOldPostsIndex');
Route::get('posts/{year}/{slug}', 'PostsController@redirectOldPost');

Route::get('{post}', 'PostsController@show')->name('posts.show');
