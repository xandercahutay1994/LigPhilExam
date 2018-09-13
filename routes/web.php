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

// Auth::routes();
// // Logout
// Route::get('/logout', ['as' => 'logout', 'uses' =>'Auth\LoginController@logout']);

/**
*	GROUPING ADMIN ROUTES
*/
Route::prefix('/')->group(function(){
	/**
	*	ALL GET REQUEST
	*/	
	Route::get('index', ['as' => 'index', 'uses' => 'Admin\AdminController@index']);
	Route::get('archive', ['as' => 'archive', 'uses' => 'Admin\AdminController@archive']);
	Route::get('single/{id}', ['as' => 'single', 'uses' => 'Admin\AdminController@single']);
	Route::get('adminPosts/{id?}', ['as' => 'adminPosts', 'uses' => 'Admin\AdminController@adminPosts']);
	Route::get('adminLists', ['as' => 'adminLists', 'uses' =>'Admin\AdminController@adminLists']);

	/**
	*	ALL POST REQUEST
	*/
	Route::post('postSubmit', 'Admin\AdminController@postSubmit'); // save post article
});