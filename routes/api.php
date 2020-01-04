<?php

use Illuminate\Http\Request;

####FOOD CONTROLLERS####
Route::resource('food','Food\FoodController')->only([
    'index','store','show','update','destroy'
]);

Route::get('foodCantA', 'Food\FoodController@indexcantidadA')->name('food.indexcantidadA');
Route::get('foodCantD', 'Food\FoodController@indexcantidadD')->name('food.indexcantidadD');

Route::get('foodFechaA', 'Food\FoodController@indexfechaA')->name('food.indexfechaA');
Route::get('foodFechaD', 'Food\FoodController@indexfechaD')->name('food.indexfechaD');

Route::get('food7', 'Food\FoodController@indexfood7')->name('food.indexfood7');


####WATER CONTROLLERS####
Route::resource('water','Water\WaterController')->only([
    'index','store','show','update','destroy'
]);

Route::get('waterCantA', 'Water\WaterController@indexcantidadA')->name('water.indexcantidadA');
Route::get('waterCantD', 'Water\WaterController@indexcantidadD')->name('water.indexcantidadD');

Route::get('waterFechaA', 'Water\WaterController@indexfechaA')->name('water.indexfechaA');
Route::get('waterFechaD', 'Water\WaterController@indexfechaD')->name('water.indexfechaD');

Route::get('water7', 'Water\WaterController@indexwater7')->name('water.indexwater7');


####ROUTINES CONTROLLERS####
Route::resource('routine', 'Routine\RoutineController')->only([
    'index','store','show','destroy'
]);

####WATER ROUTINES CONTROLLERS####
Route::resource('waterRoutine', 'WaterRoutine\WaterRoutineController')->only([
    'index','store','show','destroy'
]);

###AUDIO CONTROLLERS####
Route::resource('audio', 'Audio\AudioController');
