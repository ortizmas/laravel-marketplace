<?php

use Illuminate\Http\Request;

Route::middleware('auth')->group( function () {
    // Admin routes go here.
    Route::resource('stores', 'StoreController');
    Route::resource('products', 'ProductController');
    Route::resource('categories', 'CategoryController');

});
    
