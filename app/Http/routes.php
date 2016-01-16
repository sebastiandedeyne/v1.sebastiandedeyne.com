<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('draft/{url}', 'PostController@draft');
Route::get('{year}/{url}', 'PostController@post');
