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
Route::post('/searchresultsgenre', 'PagesController@searchResultsGenre');

Route::get('/details/{id}', 'PagesController@movieDetail');
Route::get('/actor/{id}', 'PagesController@actorDetail');

Auth::routes();

Route::get('/profile', 'PagesController@profile')->middleware('auth');

Route::get('/watchlists/{id}', 'WatchlistsController@show')->middleware('auth');
Route::post('/watchlists', 'WatchlistsController@store')->middleware('auth');
Route::post('/watchlists/item', 'WatchlistsController@storeItem')->middleware('auth');
Route::post('/watchlists/{id}', 'WatchlistsController@update')->middleware('auth');
Route::post('/watchlists/{id}/delete', 'WatchlistsController@destroy')->middleware('auth');
Route::post('/watchlists/{id}/items/{watchlist_item_id}/delete', 'WatchlistsController@destroyItem')->middleware('auth');

Route::post('/review/store', 'ReviewsController@store')->middleware('auth');
Route::post('/review/{id}/delete', 'ReviewsController@destroy')->middleware('auth');

Route::get('/review/pending', 'PagesController@pendingReviews')->middleware('can:browse_admin');
Route::post('/review/{id}/approve', 'ReviewsController@approve')->middleware('can:browse_admin');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
