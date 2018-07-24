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

Route::get('/','BuildingController@show');
Route::get('/building/','BuildingController@show');
Route::get('/classroom/{building_id}','ClassroomController@show');
Route::get('/review/show/{classroom_id}','ReviewController@show');

Route::get('/review_write/show/{classroom_id}','ReviewWritterController@show');
Route::post('/review_write/check/{classroom_id}','ReviewWritterController@check');
Route::get('/review_write/check/{classroom_id}','ReviewWritterController@redirection');

Route::get('/building_add/show/','BuildingAddController@show');
Route::post('/building_add/check/','BuildingAddController@check');
Route::get('/building_add/check/','BuildingAddController@redirection');

Route::get('/classroom_add/show/{building_id}','ClassroomAddController@show');
Route::post('/classroom_add/check/{building_id}','ClassroomAddController@check');
Route::get('/classroom_add/check/{building_id}','ClassroomAddController@redirection');

Route::post('/review/delete/{review_id}','ReviewController@delete');
Route::get('/review/delete/{review_id}','ReviewController@redirection');


// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

