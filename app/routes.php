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

Route::get('/', 'ProjectsController@index');
Route::get('article', 'ArticlesController@index');

Route::get('admin', 'AdminController@index');
Route::get('admin/articles', 'AdminController@articles');
Route::get('admin/settings', 'AdminController@settings');
Route::post('admin/updateSettings', 'AdminController@updateSettings');
