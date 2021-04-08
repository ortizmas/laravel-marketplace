<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('inicio');
Route::get('/product/{slug}', 'HomeController@single')->name('product.single');

Route::prefix('cart')->name('cart.')->group( function() {
    Route::get('/', 'CartController@index')->name('index');
    Route::post('add', 'CartController@add')->name('add');
    Route::get('remove/{slug}', 'CartController@remove')->name('remove');
    Route::get('cancel', 'CartController@cancel')->name('cancel');

});

Route::prefix('checkout')->name('checkout.')->group( function() {
    Route::get('/', 'CheckoutController@index')->name('index');

    Route::get('/confirmar-pedido', 'CheckoutController@confirmOrder')->name('confirm.order');
    Route::post('/proccess', 'CheckoutController@proccess')->name('proccess');

    Route::post('/payment', 'CheckoutController@payment')->name('payment');

});




// Route::namespace('Admin')->group(function () {
//     Route::resource('stores', 'StoreController');
//     Route::resource('products', 'ProductController');
// });

Route::get('model', function ()
{
    // Criar categoria para um produto

    $category = \App\Category::find(1);
    $product = $category->products()->sync([1, 2, 3]);

    return 'true';
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
