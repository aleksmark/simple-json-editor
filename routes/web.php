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

Route::redirect('/', '/game', 301);

Route::group(['as' => 'game-', 'prefix' => 'game'], function () {
    Route::get('/', ['as' => 'list', 'uses' => 'GamesController@index']);
    Route::post('/{id}/update', ['as' => 'update', 'uses' => 'GamesController@update']);
});
