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

Route::get('/api/servicerequests', 'ServiceRequestController@getData');
Route::get('/api/servicerequests/{service_request}/', 'ServiceRequestController@show');
Route::post('/api/servicerequests/{service_request}/toggl', 'ServiceRequestController@togglServiceRequest');

Route::get('/api/dataplans', 'DataPlanController@getData');
Route::get('/api/dataplans/{dataplan}', 'DataPlanController@getOne');
Route::post('/api/dataplans/create', 'DataPlanController@store');
Route::patch('/api/dataplans/{dataplan}/edit', 'DataPlanController@update');
Route::delete('/api/dataplans/{dataplan}', 'DataPlanController@delete');