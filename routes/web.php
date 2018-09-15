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

Auth::routes();
// Logout
Route::get('/logout', ['as' => 'logout', 'uses' =>'Auth\LoginController@logout']);

/**
*	GROUPING ADMIN ROUTES
*/
Route::prefix('/')->group(function(){
	/**
	*	ALL GET REQUEST
	*/	
	Route::get('index', ['as' => 'index', 'uses' => 'Admin\AdminsController@index']);
	Route::get('archive', ['as' => 'archive', 'uses' => 'Admin\AdminsController@archive']);
	Route::get('single/{id}', ['as' => 'single', 'uses' => 'Admin\AdminsController@show']); 
	Route::get('adminPosts', ['as' => 'create', 'uses' => 'Admin\AdminsController@create']);
	Route::get('adminPosts/{id}', ['as' => 'edit', 'uses' => 'Admin\AdminsController@edit']);
	Route::get('adminLists', ['as' => 'adminLists', 'uses' =>'Admin\AdminsController@adminLists']);

	/**
	*	ALL POST REQUEST
	*/
	Route::post('postSubmit', 'Admin\AdminsController@store'); // save post article
});