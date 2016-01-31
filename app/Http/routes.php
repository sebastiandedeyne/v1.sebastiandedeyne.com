<?php

Route::get('/', 'HomeController@home');

Route::get('/feed', 'FeedController@rss');
Route::get('/feed/rss', 'FeedController@rss');
Route::get('/feed/atom', 'FeedController@atom');

Route::get('/posts/{slug}', 'ArticleController@post')->where('slug', '(.*)');
Route::get('/{slug}', 'ArticleController@page')->where('slug', '(.*)');
