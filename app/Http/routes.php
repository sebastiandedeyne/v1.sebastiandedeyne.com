<?php

Route::get('/', 'HomeController@home');

Route::feeds();

Route::get('/posts/{slug}', 'ArticleController@post')->where('slug', '(.*)');
Route::get('/{slug}', 'ArticleController@page')->where('slug', '(.*)');
