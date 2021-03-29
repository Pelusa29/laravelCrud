<?php

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;

Route::get('/','PagesController@home');
Route::get('blog/{post}','PostController@show')->name('posts.show');


//Administracion Post
Route::group([
    'prefix' => 'admin',
    'namespace'=>'Admin',
    'middleware' =>'auth'],
    function() {

    //Administracion
    Route::get('/','AdminController@index')->name('dashboard');
    Route::get('posts','PostController@index')->name('admin.posts.index');
    Route::get('posts/create','PostController@create')->name('admin.posts.create');
    Route::post('posts','PostController@store')->name('admin.posts.store');
    Route::get('posts/{post}','PostController@edit')->name('admin.posts.edit');

    Route::put('posts/{post}','PostController@update')->name('admin.posts.update');
    //Images
    Route::post('posts/{post}/photos','PhotosController@store')->name('admin.posts.photos.store');

});

//Rutas Login
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
    //Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    //Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
if ($options['reset'] ?? true) {
        Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
}

