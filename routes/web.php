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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('articles',[
// 	'as' => 'articles_index',
// 	'uses' => 'ArticleController@index'
// ]);

// Route::get('articles/view/{id}', [
// 	'as'=> 'articles_view',
// 	'uses' => 'ArticleController@view'
// ]);

Route::group(['prefix'=> 'home'] , function () {
	Route::get('/', function () {
	    return view('welcome');
	});
});

Route::group(['prefix'=> 'articles'] , function () {

	Route::get('/',[
		'as' => 'articles_index',
		'uses' => 'ArticleController@index'
	]);

	Route::get('view/{id}', [
		'as'=> 'articles_view',
		'uses' => 'ArticleController@view'
	]);

	Route::match(['get','post'],'articles/create', [
		'as'=> 'articles_create',
		'uses' => 'ArticleController@create',
		'middleware' => 'auth'
	]);

	Route::match(['get','post'],'articles/edit/{id}', [
		'as'=> 'articles_edit',
		'uses' => 'ArticleController@edit',
		'middleware' => 'auth'
	]);

	Route::get('/articles/{id}', [
		'as'=> 'articles_delete',
		'uses' => 'ArticleController@delete',
		'middleware' => 'auth'
	]);
});