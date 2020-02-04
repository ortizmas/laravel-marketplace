<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::namespace('Admin')->group(function () {
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
    Route::resource('stores', 'StoreController');
    Route::resource('products', 'ProductController');
});

Route::get('model', function ()
{
    // Criar categoria para um produto
    
    $category = \App\Category::find(1);
    $product = $category->products()->sync([1, 2, 3]);

    return 'true';
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
