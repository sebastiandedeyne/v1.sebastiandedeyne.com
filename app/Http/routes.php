<?php

Route::feeds();

Route::get('/', 'HomeController@index');
Route::get('/{slug}', 'ArticleController@detail')->where('slug', '(.*)');
