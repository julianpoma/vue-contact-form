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
    return view('main');
});

Auth::routes();
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/api/contacts', 'ContactController@getData');
Route::get('/api/contact/{contact}', 'ContactController@show');
Route::post('/api/contact/{contact}/togglread', 'ContactController@togglRead');
Route::delete('/api/contact/{contact}', 'ContactController@destroy');

Route::get('/api/dataplans', 'DataPlanController@getData');
Route::get('/api/dataplan/{dataplan}', 'DataPlanController@getOne');
Route::post('/api/dataplan/create', 'DataPlanController@store');
Route::patch('/api/dataplan/{dataplan}/edit', 'DataPlanController@update');
Route::delete('/api/dataplan/{dataplan}', 'DataPlanController@destroy');