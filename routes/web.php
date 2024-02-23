<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
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

Route::get('/test',function(){
    $product = Product::pluck('id');
    dd($product->toArray());
})->name('test');

Auth::routes(
    [
        'reset' => false,
        'confirm' => false,
    ]
);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




    /**
     * Admin Panel
     */
    Route::group(['middleware' => ['auth','isAdmin'],'prefix'=>'admin'], function () {
        Route::get('/', 'App\Http\Controllers\Admin\HomeController@index')->name('admin.home');
       Route::resource('category',App\Http\Controllers\Admin\CategoryController::class);

       Route::resource('product',App\Http\Controllers\Admin\ProductController::class);
       Route::get('products/{category_id}','App\Http\Controllers\Admin\ProductController@allInCategory')->name('all.incategory');
    });


/**
 *  Locale_change
 */
Route::post('locale', 'App\Http\Controllers\MainController@locale')->name('locale_change');

/**
 * Currency
 */
Route::get('currency/{currencyCode}', 'App\Http\Controllers\MainController@currency')->name('currency');


/**
 * front_User
 */
Route::group([
    'middleware' => 'locale.set',
], function () {
    Route::get('/', 'App\Http\Controllers\MainController@mainPage')->name('main');
    Route::get('category/{category}', 'App\Http\Controllers\MainController@category')->name('category');

    Route::get('product/{product}', 'App\Http\Controllers\MainController@product')->name('product');
    Route::match(['post', 'get'], 'basket/add/{product}', 'App\Http\Controllers\BasketController@basketAdd')->name('basket.add');
    Route::post('basket/confirm/', 'App\Http\Controllers\BasketController@basketConfirm')->name('basket.confirm');
/**
 * basket
 */

    Route::group(['middleware' => 'basket.empty'], function () {
        Route::match(['post', 'get'], 'basket/remove/{product}', 'App\Http\Controllers\BasketController@basketRemove')->name('basket.remove');
        Route::delete('basket/delete/{product}', 'App\Http\Controllers\BasketController@basketDelete')->name('basket.delete');
        Route::get('basket/place/', 'App\Http\Controllers\BasketController@basketPlace')->name('basket.place');
        Route::get('basket', 'App\Http\Controllers\BasketController@basket')->name('basket');
    });
});


/**
 * User_Orders
 */
Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'person',
                  'middleware' => 'locale.set',], function () {
        Route::get('orders/', 'App\Http\Controllers\OrderPersonController@index')->name('person.orders');
        Route::get('order/{order}', 'App\Http\Controllers\OrderPersonController@show')->name('person.order.show');
    });
    Route::group(['prefix' => 'admin'], function () {
        Route::get('orders/', 'App\Http\Controllers\Admin\OrderController@allOrders')->name('admin.orders');
        Route::get('orders/{category}', 'App\Http\Controllers\Admin\OrderController@ordersCategory')->name('admin.orders.category');
        Route::get('order/{order}', 'App\Http\Controllers\Admin\OrderController@show')->name('admin.order.show');
       // Route::get('order/{order}', 'App\Http\Controllers\Admin\OrderController@show')->name('admin.order.show');
        Route::delete('order/delete/{order}', 'App\Http\Controllers\Admin\OrderController@orderDelete')->name('admin.order.delete');
    });
});


