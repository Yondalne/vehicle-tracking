<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Driver;
use App\Models\Maintenance;
use App\Models\Carburant;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        $carburants = Carburant::all()->count();
        $drivers = Driver::all()->count();
        $maintenances = Maintenance::all()->count();// Charger tous les véhicules depuis la base de données

    return view('vehicle.index', ['vehicles' => $vehicles,
                                    'drivers' => $drivers,
                                    'maintenances' => $maintenances,
                                    'carburants' => $carburants]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('vehicle.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "serial" => "required",
            "power" => "required",
            "color" => "required",
            "brand" => "required",
            "production_year" => "required",
            "is_attributed" => "required"
        ]);

        // Créez une nouvelle instance de Vehicle et remplissez les données demandées dans les colonnes correspondantes
        $vehicle = new Vehicle;
        $vehicle->serial = $request->input('serial');
        $vehicle->power = $request->input('power');
        $vehicle->color = $request->input('color');
        $vehicle->brand = $request->input('brand');
        $vehicle->production_year = $request->input('production_year');
        $vehicle->is_attributed = $request->input('is_attributed');

        // Enregistrez les données
        $vehicle->save();

        return redirect()->route('vehicle.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        return view('vehicle.show', [
            'vehicle' => $vehicle,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle)
    {
        return view('vehicle.edit', [
            'vehicle' => $vehicle,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            "serial" => "required",
            "power" => "required",
            "color" => "required",
            "brand" => "required",
            "production_year" => "required",
            "is_attributed" => "required"
        ]);

        // Mettez à jour les données du modèle Vehicle
        $vehicle->serial = $request->input('serial');
        $vehicle->power = $request->input('power');
        $vehicle->color = $request->input('color');
        $vehicle->brand = $request->input('brand');
        $vehicle->production_year = $request->input('production_year');
        $vehicle->is_attributed = $request->input('is_attributed');
        $vehicle->save();

        return redirect()->route('vehicle.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        return redirect()->route('vehicle.index');
    }

    public function attribution()
    {

        $viewData = [];
        $viewData["title"] = "Home Page - Online Store";
        return view('vehicle.attribution')->with("viewData", $viewData);
    }
}
