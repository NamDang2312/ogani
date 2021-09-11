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

Route::get('/','HomeController@index')->name('home.index');
Route::get('/addcart/{id}','HomeController@addcart')->name('home.addcart');
Route::get('/deleteEchCart','HomeController@deleteEachCart')->name('home.deleteEachCart');
Route::get('/shop','HomeController@shop')->name('home.shop');
Route::get('/checkout','HomeController@checkout')->name('home.checkout');
Route::get('/logout','HomeController@logout')->name('home.logout');
Route::get('/deleteCard','HomeController@deleteCard')->name('home.deleteCart');
Route::get('/login','HomeController@login')->name('home.login');
Route::get('/add_order','HomeController@add_order') -> name('home.add_order');  
Route::post('/logged','HomeController@logged')->name('home.logged');
Route::post('/updatecart','HomeController@updatecart')->name('home.updatecart');
Route::get('/orderList','HomeController@orderList') -> name('home.orderList');  
Route::get('/cancelorder','HomeController@cancelorder') -> name('home.cancelorder');  
Route::get('/re_order','HomeController@re_order') -> name('home.re_order');  
Route::get('/categorydetail/{id}','HomeController@categorydetail')->name('home.categorydetail');
Route::get('/showproduct/{id}','HomeController@showproduct')->name('home.showproduct');
Route::get('/featured','HomeController@featured')->name('home.featured');
Route::get('/bestSellingProducts','AdminController@bestSellingProducts')->name('home.bestSellingProducts');
Route::get('/slowestsellingproducts','AdminController@slowestsellingproducts')->name('home.slowestsellingproducts');
Route::group(['prefix' => 'admin'],function(){
    Route::get('/','AdminController@dashboard')->name('admin.dashboard');
    Route::get('/file','AdminController@file')->name('admin.file');
    Route::resources([
        'category' => 'CategoryController',
        'product' => 'ProductController',
        'banner' => 'BannerController',
        'blog' => 'BlogController',
        'order' =>'OrderController',
        'orderdetail' =>'OrderdetailController',
        'account' =>'AccountController'
    ]);

});
