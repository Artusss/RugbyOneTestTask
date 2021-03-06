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

Route::get('/', function () {
    return view('index');
});
Route::get("/metricks", "MetrickController@index");
Route::get("/metricks/stat", "MetrickController@showStat");
Route::get("/metricks/{site}", "MetrickController@indexSite");
Route::get("/metricks/{site}/stat", "MetrickController@showSiteStat");