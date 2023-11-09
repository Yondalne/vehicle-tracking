<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function() {
    return redirect('/dashboard');
});

Route::get('/map', [Controller::class, 'maps']);

// ---------DRIVER------------

Route::get('/profil', 'App\Http\Controllers\DriverController@profil')->name("driver.profil");
Route::get('/drivers', 'App\Http\Controllers\DriverController@index')->name("driver.index");
Route::get('/signout', 'App\Http\Controllers\DriverController@signout')->name("driver.signout");
Route::post('/store', 'App\Http\Controllers\DriverController@store')->name("driver.store");

// ---------VEHICULE----------
Route::get('/dashboard', 'App\Http\Controllers\VehicleController@index')->name("vehicle.index");
Route::post('/store/vehicle', 'App\Http\Controllers\VehicleController@store')->name("vehicle.store");
Route::get('/track', 'App\Http\Controllers\VehicleController@track')->name("vehicle.track");


Route::get('/fuel', 'App\Http\Controllers\CarburantController@index')->name("vehicle.fuel");
Route::post('/fuel/search', 'App\Http\Controllers\CarburantController@search')->name("fuel.search");


Route::get('/maintenance', 'App\Http\Controllers\MaintenanceController@index')->name("vehicle.maintenance");
Route::post('/maintenance/search', 'App\Http\Controllers\MaintenanceController@search')->name("maintenance.search");


Route::get('/attribution', 'App\Http\Controllers\DriveController@index')->name("vehicle.attribution");
Route::post('/store/attribution', 'App\Http\Controllers\DriveController@store')->name("attribution.store");



