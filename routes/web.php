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

Route::get('/api/servicerequest', 'ServiceRequestController@getData');
Route::get('/api/servicerequest/{service_request}/', 'ServiceRequestController@show');
Route::post('/api/servicerequest/{service_request}/toggl', 'ServiceRequestController@togglServiceRequest');