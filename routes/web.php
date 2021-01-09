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
   return redirect()->route('login');
});
Auth::routes();

Route::middleware(['auth'])->group(function () {
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('user', 'UserController');
Route::resource('customer', 'CustomerController');
Route::resource('vendor', 'VendorController');
Route::post('/vendor/store2', 'VendorController@store2')->name('vendor.store2');
Route::resource('category', 'ProductCategoryController');
Route::resource('product', 'ProductController');
Route::resource('orders','OrderController');
Route::resource('foreigner-agent','ForeignerAgentController');

Route::get('/download/{id}','OrderController@download')->name('order.download');

Route::get('/by/product','ReportController@byproduct')->name('by.product');
Route::get('/by/customer','ReportController@bycustomer')->name('by.customer');
Route::get('/by/vendor','ReportController@byvendor')->name('by.vendor');
});


