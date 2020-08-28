<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix'=>'user'],function (){
    Route::get('/list','UserController@ListAll')->name('user.list');
    Route::post('/create','UserController@StoreUser')->name('user.create');
    Route::post('/table','UserController@ListTable')->name('user.table');
});