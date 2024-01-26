<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
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

Auth::routes(
    [
        'reset' => false,
        'confirm' => false,
    ]
);

Route::group(['middleware'=> 'auth'], function(){
    Route::group(['prefix' => 'person'], function(){
        Route::get('orders/','App\Http\Controllers\Person\OrderController@index')->name('person.orders');
        Route::get('orders/{order}','App\Http\Controllers\Person\OrderController@show')->name('person.order.show');
    });

    Route::group(['middleware' => 'isAdmin'],function(){

    });
});

Route::post('locale', 'App\Http\Controllers\MainController@locale')->name('locale_change');
Route::get('currency/{currencyCode}','App\Http\Controllers\MainController@currency')->name('currency');

Route::group([
    'middleware' => 'locale.set',
], function () {
    Route::get('/', 'App\Http\Controllers\MainController@mainPage')->name('main');
    Route::get('category/{category}', 'App\Http\Controllers\MainController@category')->name('category');

    Route::get('product/{product}', 'App\Http\Controllers\MainController@product')->name('product');
    Route::match(['post', 'get'], 'basket/add/{product}', 'App\Http\Controllers\BasketController@basketAdd')->name('basket.add');
    Route::post('basket/confirm/', 'App\Http\Controllers\BasketController@basketConfirm')->name('basket.confirm');

    Route::group(['middleware' => 'basket.empty'], function () {
        Route::match(['post', 'get'], 'basket/remove/{product}', 'App\Http\Controllers\BasketController@basketRemove')->name('basket.remove');
        Route::delete('basket/delete/{product}', 'App\Http\Controllers\BasketController@basketDelete')->name('basket.delete');
        Route::get('basket/place/', 'App\Http\Controllers\BasketController@basketPlace')->name('basket.place');
      Route::get('basket', 'App\Http\Controllers\BasketController@basket')->name('basket');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
