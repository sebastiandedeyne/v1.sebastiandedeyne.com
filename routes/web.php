<?php

Route::feeds();

Route::get('/', 'HomeController@index')->name('home');

Route::view('about', 'about.index')->name('about');
Route::view('newsletter', 'newsletter.index')->name('newsletter');

Route::view('privacy', 'privacy.index')->name('privacy');

Route::get('posts', 'PostsController@index')->name('posts');
Route::get('posts/{year}/{slug}', 'PostsController@redirectOldPost');

Route::get('{post}', 'PostsController@show')->name('posts.show');
Route::get('{post}/og-image', 'PostsController@ogImage');

Route::domain('growingthestack.io')->group(function () {
    Route::redirect('{url}', 'sebastiandedeyne.com/newsletter')->where('url', '(.*)');
});
