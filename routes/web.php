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
Route::get('/home', 'PagesController@index');
Route::post('/searchresults', 'PagesController@searchResults');
Route::get('/details/{id}', 'PagesController@movieDetail');

Auth::routes();
Route::get('/profile', 'PagesController@profile')->middleware('auth');
Route::get('/watchlists/{id}', 'WatchlistsController@show')->middleware('auth');
Route::post('/watchlists', 'WatchlistsController@store')->middleware('auth');
Route::post('/watchlists/item', 'WatchlistsController@storeItem')->middleware('auth');
