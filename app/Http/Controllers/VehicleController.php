<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $vehicle = Vehicle::all();

        return view('vehicle.index', [
            'vehicle' => $vehicle,
        ]);
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
        // Get the data from the request
        $serial = $request->input('serial');
        $power = $request->input('power');
        $color = $request->input('color');
        $brand = $request->input('brand');
        $production_year = $request->input('production_year');
        $is_attributed = $request->input('is_attributed');

        // Create a new Vehicle instance and put the requested data to the corresponding column
        $vehicle = new Vehicle;
        $vehicle->serial = $serial;
        $vehicle->power = $power;
        $vehicle->color = $color;
        $vehicle->brand = $brand;
        $vehicle->production_year = $production_year;
        $vehicle->is_attributed = $is_attributed;

        // Save the data
        $vehicle->save();

        return redirect()->route('vehicle.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        $vehicle = Vehicle::all()->find($id);

        return view('vehicle.show', [
            'vehicle' => $vehicle,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle)
    {
        $vehicle = Vehicle::all()->find($id);

        return view('vehicle.edit', [
            'vehicle' => $vehicle,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $serial = $request->input('serial');
        $power = $request->input('power');
        $color = $request->input('color');
        $brand = $request->input('brand');
        $production_year = $request->input('production_year');
        $is_attributed = $request->input('is_attributed');

        $driver = Vehicle::all()->find($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $vehicle = Vehicle::all()->find($id);

        $vehicle->delete();

        return redirect()->route('vehicle.index');
    }
}
