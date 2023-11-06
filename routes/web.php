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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{vehicle}/map', [Controller::class, 'maps']);


// ---------DRIVER------------
Route::get('/dashboard', 'App\Http\Controllers\DriverController@index')->name("driver.index");
Route::get('/profil', 'App\Http\Controllers\DriverController@profil')->name("driver.profil");
Route::get('/drivers', 'App\Http\Controllers\DriverController@driverlist')->name("driver.listing");
Route::get('/signout', 'App\Http\Controllers\DriverController@signout')->name("driver.signout");
Route::get('/', 'App\Http\Controllers\DriverController@sign')->name("driver.sign");

// ---------VEHICULE----------
Route::get('/track', 'App\Http\Controllers\VehicleController@track')->name("vehicle.track");
Route::get('/fuel', 'App\Http\Controllers\VehicleController@fuel')->name("vehicle.fuel");

Route::get('/maintenance', 'App\Http\Controllers\VehicleController@maintenance')->name("vehicle.maintenance");
