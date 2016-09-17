<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::resource('countries', 'CountriesController');
Route::resource('harbor', 'HarborsController');
Route::resource('items', 'ItemsController');

// resource exports
Route::get('/exports', 'ExportsController@index');
Route::get('/exports/create', 'ExportsController@create');
Route::get('/exports/{id}/edit', 'ExportsController@edit');
Route::post('/exports', 'ExportsController@store');
Route::patch('/exports/{id}', 'ExportsController@update');
Route::delete('/exports/{id}', [
	'uses'=>'ExportsController@destroy',
	'as'=>'exports.destroy'
]);

// resource imports
Route::get('/imports', 'ImportsController@index');
Route::get('/imports/create', 'ImportsController@create');
Route::get('/imports/{id}/edit', 'ImportsController@edit');
Route::post('/imports', 'ImportsController@store');
Route::patch('/imports/{id}', 'ImportsController@update');
Route::delete('/imports/{id}', [
	'uses'=>'ImportsController@destroy',
	'as'=>'imports.destroy'
]);


Route::get('/exports?sort={sort}', [
	'uses'=>'ExportsController@index',
	'as'=>'sort_exports'
]);

Route::get('/imports?sort={sort}', [
	'uses'=>'ImportsController@index',
	'as'=>'sort_imports'
]);

Route::get('/exports/statistic', 'ExportsController@statistic');

Route::get('/imports/statistic', 'ImportsController@statistic');

Route::get('exports/{country}', 'ExportsController@countryStats');

Route::get('imports/{country}', 'ImportsController@countryStats');

Route::auth();

Route::get('/home', 'HomeController@index');
