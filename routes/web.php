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

Route::get('/form/getdataplans', 'FormController@getDataPlans');
Route::post('/form/create', 'FormController@store');

Auth::routes();
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/api/servicerequest', 'ServiceRequestController@getData');