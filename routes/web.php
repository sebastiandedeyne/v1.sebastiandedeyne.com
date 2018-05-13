<?php

Route::feeds();

Route::get('/', 'HomeController@index')->name('home');

Route::view('/about', 'about.index')->name('about');
Route::view('/newsletter', 'newsletter.index')->name('newsletter');

Route::get('/posts', 'PostsController@index')->name('posts');
Route::get('/posts/{year}/{slug}', 'PostsController@redirectOldPost');

Route::get('/{slug}', 'PostsController@show')->name('posts.show')->where('slug', '(.*)');

Route::domain('growingthestack.io')->group(function () {
    Route::redirect('{url}', 'sebastiandedeyne.com/newsletter')->where('url', '(.*)');
});
