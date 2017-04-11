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
Route::paginate('/', 'FrontController@index');
Route::paginate('/category/{slug}', 'FrontController@category');
Route::get('/{slug}', 'FrontController@single');
Route::post('/search', 'FrontController@search');
Route::paginate('/search-result/{keyword}', 'FrontController@search_result');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/post-category', 'PostCategoryController@index');
Route::get('/post-category/add', 'PostCategoryController@create');
Route::post('/post-category/store', 'PostCategoryController@store');
Route::get('/post-category/edit/{id}', 'PostCategoryController@edit')->name('cpost.edit');
Route::post('/post-category/{id}/update', 'PostCategoryController@update');
Route::delete('/post-category/delete/{cpost}', 'PostCategoryController@destroy');


Route::get('/posts', 'PostController@index');
Route::get('/post/add', 'PostController@create');
Route::post('/post/store', 'PostController@store');
Route::get('/post/edit/{post}', 'PostController@edit');
Route::patch('/post/update/{id}', 'PostController@update');
Route::delete('/post/delete/{post}', 'PostController@destroy');
Route::post('/post/publish/{post}', 'PostController@publicPost');


Route::get('/pages', 'PageController@index');
Route::get('/pages/add', 'PageController@create');
Route::post('/pages/store', 'PageController@store');
Route::get('/pages/edit/{page}', 'PageController@edit');
Route::patch('/pages/update/{id}', 'PageController@update');
Route::delete('/pages/delete/{page}', 'PageController@destroy');
Route::post('/pages/publish/{page}', 'PageController@publishPage');


Route::get('/users', 'UserController@index');
Route::get('/users/add', 'UserController@create');

Route::patch('/users/change-status/{user}', 'UserController@changeStatus');
Route::delete('/users/delete/{user}', 'UserController@destroy');

Route::get('/settings', 'SettingController@index');
Route::post('/settings/store', 'SettingController@store');
