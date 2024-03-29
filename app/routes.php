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

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('articles', 'ContentController@home');

Route::get('article/{slug}', array(
	'uses' 	=> 'ContentController@article',
	'as'	=> 'view'
	));

Route::get('register', 'ArticleController@create');

Route::post('register', array(
	'uses'	=> 'ArticleController@store',
	'as'	=> 'store'
	));

