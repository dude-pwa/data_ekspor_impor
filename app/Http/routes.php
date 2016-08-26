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

Route::get('/exports/statistic', 'ExportsController@statistic');

Route::get('/imports/statistic', 'ImportsController@statistic');

Route::get('exports/{country}', 'ExportsController@countryStats');

Route::get('imports/{country}', 'ImportsController@countryStats');

Route::resource('countries', 'CountriesController');
Route::resource('harbor', 'HarborsController');
Route::resource('items', 'ItemsController');
Route::resource('exports', 'ExportsController');
Route::resource('imports', 'ImportsController');

Route::get('/exports?sort={sort}', [
	'uses'=>'ExportsController@index',
	'as'=>'sort_exports'
]);

Route::get('/imports?sort={sort}', [
	'uses'=>'ImportsController@index',
	'as'=>'sort_imports'
]);

