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

/* Dashboard */
Route::get('/', 'DashboardController@index');

Route::post('/tickets/save',  'DashboardController@store');

Route::get('/tickets/{id}/delete', 'DashboardController@destroy');


/* Posts */
Route::get('/posts', 'PostController@index');

Route::get('/posts/create',  'PostController@create');

Route::post('/posts/save',  'PostController@store');

Route::get('/posts/{id}',  'PostController@show');

Route::get('/posts/{id}/edit', 'PostController@edit');

Route::put('/posts/{id}/update', 'PostController@update');

Route::get('/posts/{id}/delete', 'PostController@destroy');

Route::get('/search_results', 'PostController@search_results');

/* Categories */
Route::get('/categories', 'CategoriesController@index');

Route::get('/categories/create',  'CategoriesController@create');

Route::post('/categories/save',  'CategoriesController@store');

Route::get('/categories/{id}/edit', 'CategoriesController@edit');

Route::put('/categories/{id}/update', 'CategoriesController@update');

Route::get('/categories/{id}/delete', 'CategoriesController@destroy');

/* Users */
Route::get('/users', 'UsersController@index');

Route::get('/users/{id}',  'UsersController@show');

Route::get('/users/create',  'UsersController@create');

Route::post('/users/save',  'UsersController@store');

Route::get('/users/{id}/edit', 'UsersController@edit');

Route::put('/users/{id}/update', 'UsersController@update');

Route::get('/users/{id}/delete', 'UsersController@destroy');

/* Site */
Route::get('/site', 'SiteController@index');

Route::get('/site/{id}/edit', 'SiteController@edit');

Route::put('/site/{id}/update', 'SiteController@update');
/*
Route::get('/posts/{id}', function ($id) {
   return "Post id: {$id}";
});

Route::get('/posts/{id}/comments/{comment_id}', function ($id, $comment_id) {
   return "Post id: {$id} <br> comment_id: {$comment_id}";
});

Route::get('/posts/{id}/comments/{comment_id}/{likes}', function ($id, $comment_id,$likes) {
   return $likes;
});

*/

Auth::routes();

Route::get('/home', 'DashboardController@index')->name('home');
