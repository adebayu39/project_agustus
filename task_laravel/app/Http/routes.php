<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'Controller@tampil');

Route::get('article/{id}', 'Controller@show');

Route::resource('comments', 'CommentsController');

Route::resource('articles', 'ArticlesController');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/export', 'ExcelController@export');

Route::post('/postImport', 'ExcelController@postImport');
Route::get('/getImport', 'ExcelController@getImport');