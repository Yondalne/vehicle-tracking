<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drive;
use App\Models\Driver;
use App\Models\Vehicle;
class DriveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drives = Drive::all(); // Charger tous les véhicules depuis la base de données
        $drivers = Driver::all();
        $vehicles = Vehicle::all();
        return view('vehicle.attribution', ['drives' => $drives,
        'drivers'=> $drivers,
        'vehicles'=> $vehicles ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //dd($request->all());
         $request->validate([
            "driver_id" => "required",
            "vehicle_id" => "required"
        ]);
        // Get the data from the request
        $driver_id = $request->input('driver_id');
        $vehicle_id = $request->input('vehicle_id');
        // Create a new Driver instance and put the requested data to the corresponding column
        $drive = new Drive;
        $drive->driver_id = $driver_id;
        $drive->vehicle_id = $vehicle_id;
        
        // Save the data
        $drive->save();
       
        $drive->driver()->first()->update(['is_associated'=>1]);
        $drive->vehicle()->first()->update(['is_attributed'=>1]);

        

        return redirect()->route('vehicle.attribution');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
