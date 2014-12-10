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
Route::get('articulo/{slug}', ['uses' => 'ArticlesController@index']);

Route::group(['prefix' => 'admin'], function(){

    Route::get('/', 'AdminController@login');
    Route::get('twitterLogin', 'AdminController@twitterLogin');
    Route::get('twitterCallback', 'AdminController@twitterCallback');
    Route::get('twitterError', 'AdminController@twitterError');

    Route::group(['before' => 'auth'], function(){
        Route::get('article', 'AdminController@article');
        Route::get('article/{id?}', ['uses' => 'AdminController@article'])->where('id', '[0-9]+');
        Route::get('article/delete/{id}', ['uses' => 'AdminController@deleteArticle'])->where('id', '[0-9]+');
        Route::post('saveArticle', 'AdminController@saveArticle');
        Route::post('updateArticle/{id}', ['uses' => 'AdminController@updateArticle']);

        Route::get('articles', 'AdminController@articles');
        Route::get('settings', 'AdminController@settings');
        Route::post('updateSettings', 'AdminController@updateSettings');

        Route::get('twitterLogout', 'AdminController@twitterLogout');
    });

});
