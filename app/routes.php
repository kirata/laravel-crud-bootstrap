<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/',array('as' => 'home','uses'=>'UserController@index'));
Route::get('login',array('uses'=>'UserController@login'));
Route::post('login',array('uses'=>'UserController@checkLogin'));
Route::get('logout',array('uses'=>'UserController@logout'));
//Route::group('');
Route::get('dashboard',array('uses'=>'DashboardController@index'));
Route::get('dashboard/add',array('uses'=>'DashboardController@addPage'));
Route::post('dashboard/add',array('uses'=>'DashboardController@saveData','before'=>'csrf'));
Route::get('dashboard/detail/{id_sp}',array('uses'=>'DashboardController@detailPage'));
