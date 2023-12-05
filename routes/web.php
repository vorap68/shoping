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

Route::group([
    'middleware' => 'locale.set',
],function(){
    Route::get('/', 'App\Http\Controllers\MainController@mainPage')->name('main');
    Route::post('locale','App\Http\Controllers\MainController@locale')->name('locale_change');
    Route::get('category/{code}','App\Http\Controllers\MainController@category')->name('category');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
