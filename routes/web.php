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

Route::get('/', function () {
    return view('welcome');
});

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
Route::delete('/post/delete/{post}', 'PostController@destroy');
Route::post('/post/publish/{post}', 'PostController@publicPost');
