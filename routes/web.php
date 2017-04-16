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
Route::get('/', 'PagesController@index');
Route::get('/post/{slug}', 'PagesController@single');

Route::get('/about', 'PagesController@getAbout');
Route::get('/contact', 'PagesController@getContact');
Route::post('/contact', 'PagesController@postContact');

Route::resource('/comments', 'CommentsController');

Route::group(['middleware' => 'auth'], function(){
	Route::resource('/posts', 'PostsController');
	Route::resource('/categories', 'CategoriesController');
	Route::resource('/tags', 'TagsController');
});
Route::get('/logout', 'HomeController@logout');



Auth::routes();

