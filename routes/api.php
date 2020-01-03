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


####FOOD CONTROLLERS####
Route::resource('food','Food\FoodController');

Route::get('foodCantA', 'Food\FoodController@indexcantidadA')->name('food.indexcantidadA');
Route::get('foodCantD', 'Food\FoodController@indexcantidadD')->name('food.indexcantidadD');

Route::get('foodFechaA', 'Food\FoodController@indexfechaA')->name('food.indexfechaA');
Route::get('foodFechaD', 'Food\FoodController@indexfechaD')->name('food.indexfechaD');

Route::get('food7', 'Food\FoodController@indexfood7')->name('food.indexfood7');

Route::post('foodpublisher', 'Food\FoodController@foodpublisher')->name('food.foodpublisher');
//Route::get('foodconsumer', 'Food\FoodController@foodconsumer')->name('food.foodconsumer');

####WATER CONTROLLERS####
Route::resource('water','Water\WaterController');

//Route::get('waterCantA', 'Water\WaterController@indexcantidadA')->name('water.indexcantidadA');
//Route::get('waterCantD', 'Water\WaterController@indexcantidadD')->name('water.indexcantidadD');

//Route::get('waterFechaA', 'Water\WaterController@indexfechaA')->name('water.indexfechaA');
//Route::get('waterFechaD', 'Water\WaterController@indexfechaD')->name('water.indexfechaD');

//Route::get('water7', 'Water\WaterController@indexfood7')->name('water.indexfood7');


####ROUTINES CONTROLLERS####
Route::resource('routine', 'Routine\RoutineController');

###AUDIO CONTROLLERS####
Route::resource('audio', 'Audio\AudioController');

//Route::get('audio', 'Audio\AudioController@index')->name('audio.index');
//Route::get('audio\{audio}', 'Audio\AudioController@show')->name('audio.show');
//Route::post('audio', 'Audio\AudioController@store')->name('audio.store');
//Route::post('audio\{audio}', 'Audio\AudioController@update')->name('audio.update');
//Route::delete('audio\{audio}', 'Audio\AudioController@destroy')->name('audio.destroy');
