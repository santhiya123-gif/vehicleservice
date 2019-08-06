<?php
use App\Models\{VehicleMakes,VehicleModels,ServiceRequests};
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
Route::get('/viewdatas', function(){
	echo VehicleMakes::all();
	echo VehicleModels::all();

});
Route::get('/', 'ServiceRequestsController@index')->name('home');
Route::get('create', 'ServiceRequestsController@getCreate')->name('create');
Route::get('create/{id}', 'ServiceRequestsController@getCreate');

Route::post('postcreate', 'ServiceRequestsController@postCreate');
Route::get('delete/{id}', 'ServiceRequestsController@getDelete');
Route::post('getmodels', 'ServiceRequestsController@getmodels');
Route::get('{id}', 'ServiceRequestsController@edit')->name('edit');
	