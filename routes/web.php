<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/crud', \App\Http\Controllers\CRUDController::class);
Route::post('crud/load', [
    'as' => 'crud-load',
    'uses' => '\App\Http\Controllers\CRUDController@data_load_crud'
]);	



Route::get('data-list', [
    'as' => 'data-list',
    'uses' => '\App\Http\Controllers\CRUDController@data_list'
]);	
Route::post('data/load', [
    'as' => 'data-load',
    'uses' => '\App\Http\Controllers\CRUDController@data_load'
]);	

Route::get('data-list2', [
    'as' => 'data-list2',
    'uses' => '\App\Http\Controllers\CRUDController@data_list2'
]);	
Route::post('data2/load', [
    'as' => 'data2-load',
    'uses' => '\App\Http\Controllers\CRUDController@data_load2'
]);	



Route::get('/template', function () {
    return view('template');
});