<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarburantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\ChauffeurController;
use App\Http\Controllers\LocalisationController;
use App\Http\Controllers\MaintenanceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login-driver', [AuthController::class, 'loginDriver'])->name('login-driver');
Route::post('register-driver', [AuthController::class, 'RegisterDriver'])->name('register-driver');

//Api maintenance
Route::resource('maintenance', MaintenanceController::class);

//Api carburant
Route::resource('carburant', CarburantController::class);

//Api localisation
Route::resource('localisation', LocalisationController::class);
