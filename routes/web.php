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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'PagesController@index');
Route::get('/contact', 'PagesController@contact');
Route::post('/contact', 'PagesController@contact_with_data');
Route::get('/about', 'PagesController@about_us');
Route::post('/', 'NewsletterController@newsletterUpdate');

Route::resource('users', 'UsersController');
Route::resource('tags', 'TagController');
Route::resource('categories', 'CategoriesController');

Route::resource('posts', 'PostsController');

Route::resource('comments', 'CommentController');

Route::resource('replies', 'CommentReplyController');

Route::get('/search', 'PostsController@search')->name('search');
Route::get('/archive', 'PostsController@archivepost')->name('archive');
