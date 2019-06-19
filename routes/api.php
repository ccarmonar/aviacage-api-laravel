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

Route::resource('food','Food\FoodController');

Route::get('foodCantA', 'Food\FoodController@indexcantidadA')->name('food.indexcantidadA');
Route::get('foodCantD', 'Food\FoodController@indexcantidadD')->name('food.indexcantidadD');

Route::get('foodFechaA', 'Food\FoodController@indexfechaA')->name('food.indexfechaA');
Route::get('foodFechaD', 'Food\FoodController@indexfechaD')->name('food.indexfechaD');

Route::get('food7', 'Food\FoodController@indexfood7')->name('food.indexfood7');

Route::post('foodpublisher', 'Food\FoodController@foodpublisher')->name('food.foodpublisher');
//Route::get('foodconsumer', 'Food\FoodController@foodconsumer')->name('food.foodconsumer');