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
    Route::get('/get','UserController@GetUser')->name('user.get');
    Route::post('/table','UserController@ListTable')->name('user.table');
    Route::post('/create','UserController@StoreUser')->name('user.create');
    Route::post('/update','UserController@UpdateUser')->name('user.update');
    Route::post('/delete','UserController@DeleteUser')->name('user.delete');

    Route::group(['prefix'=>'level'],function (){
        Route::get('/list','UserController@AllUserLevel')->name('user.level');
    });
});