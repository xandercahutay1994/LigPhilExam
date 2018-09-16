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
	Route::get('index', ['as' => 'index', 'uses' => 'Admin\AdminController@index']); // article list with images
	Route::get('archive', ['as' => 'archive', 'uses' => 'Admin\AdminController@archive']); // paginated article
	Route::get('single/{id}', ['as' => 'single', 'uses' => 'Admin\AdminController@show']); //specific article
	Route::get('adminPosts', ['as' => 'create', 'uses' => 'Admin\AdminController@create']); //saving new article
	Route::get('adminPosts/{id}', ['as' => 'edit', 'uses' => 'Admin\AdminController@edit']); //update existing article
	Route::get('adminLists', ['as' => 'adminLists', 'uses' =>'Admin\AdminController@adminLists']); //list of article

	/**
	*	ALL POST REQUEST
	*/
	Route::post('store', 'Admin\AdminController@store'); // save post article
});