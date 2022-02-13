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
use App\Http\Controllers\ThingController;

Auth::routes();
Route::group(['middleware' => ['auth']], function(){
    Route::get('/', 'ThingController@register');
    Route::get('/things', 'ThingController@things');
    Route::get('/things/returned', 'ThingController@returned');
    Route::get('/things/returned/{thing_id}', 'ThingController@returned_show');
    Route::get('/things/who/{who}', 'ThingController@who');
    Route::get('/things/{thing}', 'ThingController@show');
    Route::delete('/things/{thing}', 'ThingController@delete');
    Route::delete('/things/returned/{thing_id}', 'ThingController@forcedelete');
    Route::post('/', 'ThingController@store');
});