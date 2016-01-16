<?php

Route::get('/', 'HomeController@home');
Route::get('{slug}', 'ArticleController@article')->where('slug', '(.*)');
