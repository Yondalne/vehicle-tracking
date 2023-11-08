<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use App\Models\Driver;
use Exception;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $maintenances = Maintenance::all(); // Charger tous les véhicules depuis la base de données
        $drivers= Driver::all();

        return view('vehicle.maintenance', ['maintenances' => $maintenances,
            'drivers'=>$drivers
    ]);

    }
    public function serach(){

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
        $request->validate([
            "numfact" => "required",
            "repsais" => "required",
            "montantM" => "required",
            "vehicle_id" => "required",
            "driver_id" => "required",
        ]);

        $maintenance = new Maintenance();
        $maintenance -> numfact = $request->numfact;
        $maintenance -> repsais = $request->repsais;
        $maintenance -> montantM = $request->montantM;
        $maintenance -> date = date('Y-m-d');

        $maintenance -> vehicle_id = $request->vehicle_id;
        $maintenance -> driver_id = $request->driver_id;


        // try {
            $maintenance->save();
            return response()->json(["message" => "Success"], 200);
        // } catch (Exception $e) {
            return response()->json(["message" => "Error"], 401);
        // }
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
