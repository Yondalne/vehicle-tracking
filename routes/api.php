<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\ChauffeurController;
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

//Api chauffeur
Route::get("chauffeur", [ChauffeurController::class, "index"]);
Route::get("chauffeur/{id}", [ChauffeurController::class, "show"]);
Route::post("createchauffeur", [ChauffeurController::class, "create"]);
Route::put("updatechauffeur/{id}", [ChauffeurController::class, "update"]);
Route::delete("deletechauffeur/{id}", [ChauffeurController::class, "destroy"]);

//Api vehicule
Route::get("vehicule", [VehiculeController::class, "index"]);
Route::get("vehicule/{id}", [VehiculeController::class, "show"]);
Route::post("createvehicule", [VehiculeController::class, "create"]);
Route::put("updatevehicule/{id}", [VehiculeController::class, "update"]);
Route::delete("deletevehicule/{id}", [VehiculeController::class, "destroy"]);


//Api maintenance
Route::get("maintenance", [MaintenanceController::class, "index"]);
Route::get("maintenance/{id}", [MaintenanceController::class, "show"]);
Route::post("createmaintenance", [MaintenanceController::class, "create"]);
Route::put("updatemaintenance/{id}", [MaintenanceController::class, "update"]);
Route::delete("deletemaintenance/{id}", [MaintenanceController::class, "destroy"]);


//Api carburant
Route::get("carburant", [CarburantController::class, "index"]);
Route::get("carburant/{id}", [CarburantController::class, "show"]);
Route::post("createcarburant", [CarburantController::class, "create"]);
Route::put("updatecarburant/{id}", [CarburantController::class, "update"]);
Route::delete("deletecarburant/{id}", [CarburantController::class, "destroy"]);


//Api admin
Route::get("admin", [AdminController::class, "index"]);
Route::get("admin/{id}", [AdminController::class, "show"]);
Route::post("createadmin", [AdminController::class, "create"]);
Route::put("updateadmin/{id}", [AdminController::class, "update"]);
Route::delete("deleteadmin/{id}", [AdminController::class, "destroy"]);


//Api localisation
Route::get("localisation", [LocalisationController::class, "index"]);
Route::get("localisation/{id}", [LocalisationController::class, "show"]);
Route::post("createlocalisation", [LocalisationController::class, "create"]);
Route::put("updatelocalisation/{id}", [LocalisationController::class, "update"]);
Route::delete("deletelocalisation/{id}", [LocalisationController::class, "destroy"]);
