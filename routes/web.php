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

// Frontend site 
Route::get('/', 'HomeController@index');

//Show Product by Category Route here...
Route::get('/product-by-category/{category_id}', 'HomeController@show_product_by_category');
Route::get('/product-by-manufacture/{manufacture_id}', 'HomeController@show_product_by_manufacture');

//show single page of product .....
Route::get('/show-product/{product_id}', 'HomeController@show_product_by_id');

//Cart 
Route::post('/add-to-cart', 'CartController@add_to_cart');
Route::get('/show-cart', 'CartController@show_cart');
Route::get('/delete-to-cart/{rowId}', 'CartController@delete_to_cart');
Route::post('/update-cart', 'CartController@update_cart');


// Checkout route here ....
Route::get('/login-check', 'CheckOutController@login_check');
Route::post('/customer-registration', 'CheckOutController@customer_registration');
Route::get('/checkout', 'CheckOutController@checkout');
Route::post('/shipping-details', 'CheckOutController@shipping_details');
Route::post('/customer-login', 'CheckOutController@customer_login');
Route::get('/customer-logout', 'CheckOutController@customer_logout');
Route::get('/payment', 'CheckOutController@payment');
Route::post('/order-place', 'CheckOutController@order_place');


Route::get('/manage-order', 'CheckOutController@manage_order');
Route::get('/view-order-details/{order_id}', 'CheckOutController@view_order_details');




// Backend Routes............
Route::get('/logout', 'SuperAdminController@logout');
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'SuperAdminController@index');
Route::post('/admin-dashboard', 'AdminController@dashboard');

//Category Related Routes .......
Route::get('/add-category', 'CategoryController@index');
Route::get('/all-category', 'CategoryController@all_category');
Route::post('/save-category', 'CategoryController@save_category');
Route::get('/edit-category/{category_id}', 'CategoryController@edit_category');
Route::post('/update-category/{category_id}', 'CategoryController@update_category');
Route::get('/delete-category/{category_id}', 'CategoryController@delete_category');
Route::get('/inactive-category/{category_id}', 'CategoryController@inactive_category');
Route::get('/active-category/{category_id}', 'CategoryController@active_category');

//Manufacture Related Routes .......
Route::get('/add-manufacture', 'ManufactureController@index');
Route::get('/all-manufacture', 'ManufactureController@all_manufacture');
Route::post('/save-manufacture', 'ManufactureController@save_manufacture');
Route::get('/edit-manufacture/{manufacture_id}', 'ManufactureController@edit_manufacture');
Route::post('/update-manufacture/{manufacture_id}', 'ManufactureController@update_manufacture');
Route::get('/delete-manufacture/{manufacture_id}', 'ManufactureController@delete_manufacture');
Route::get('/inactive-manufacture/{manufacture_id}', 'ManufactureController@inactive_manufacture');
Route::get('/active-manufacture/{manufacture_id}', 'ManufactureController@active_manufacture');


//Product Related Routes .......
Route::get('/add-product', 'ProductController@index');
Route::post('/save-product', 'ProductController@save_product');
Route::get('/all-product', 'ProductController@all_product');
Route::get('/inactive-product/{product_id}', 'ProductController@inactive_product');
Route::get('/active-product/{product_id}', 'ProductController@active_product');
Route::get('/delete-product/{product_id}', 'ProductController@delete_product');