<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//List all Products
Route::get("getAllProducts","ProductController@index");

//List single Product
Route::get("product/{id}","ProductController@show");

//Create Product
Route::post("product","ProductController@store");


//update Product
Route::put("product","ProductController@store");

//Delete Product
Route::delete("product/{id}","ProductController@destroy");

/* Routes for product categories */

//List all Products Categories
Route::get("getAllProductsCat","ProductCategoryController@index");

//List single Product Category
Route::get("productCategory/{id}","ProductCategoryController@show");

//Create Products Category
Route::post("productCategory","ProductCategoryController@store");


//update Product Category
Route::put("productCategory","ProductCategoryController@store");

//Delete Product Category
Route::delete("productCategory/{id}","ProductCategoryController@destroy");
