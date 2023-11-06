<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use Exception;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            "date" => "required",
        ]);

        $maintenance = new Maintenance();
        $maintenance -> numfact = $request->numfactCa;
        $maintenance -> repsais = $request->nblitre;
        $maintenance -> montantM = $request->montantM;
        $maintenance -> date = $request->date;

        $maintenance -> vehicle_id = $request->vehicle_id;
        $maintenance -> driver_id = $request->driver_id;


        try {
            $maintenance->save();
            return response()->json(["message" => "Success"], 200);
        } catch (Exception $e) {
            return response()->json(["message" => "Error"], 401);
        }
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
