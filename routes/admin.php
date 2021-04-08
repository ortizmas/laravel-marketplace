<?php

use Illuminate\Http\Request;

Route::middleware('auth')->group( function () {
    // Admin routes go here.
    Route::get('/', 'StoreController@index')->name('admin');
    Route::resource('stores', 'StoreController');
    Route::resource('products', 'ProductController');
    Route::resource('categories', 'CategoryController');

    Route::post('photo/remove', 'ProductPhotoController@removePhoto')->name('photo.remove');
});

