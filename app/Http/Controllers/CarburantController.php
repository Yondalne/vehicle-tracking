<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carburant;
use Exception;

class CarburantController extends Controller
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

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "numfactCa" => "required",
            "nblitre" => "required",
            "montant" => "required",
            "vehicle_id" => "required",
            "driver_id" => "required",
        ]);

        $carburant = new Carburant();
        $carburant -> numfactCa = $request->numfactCa;
        $carburant -> nblitre = $request->nblitre;
        $carburant -> montant = $request->montant;
        $carburant -> date = date('Y-m-d');

        $carburant -> vehicle_id = $request->vehicle_id;
        $carburant -> driver_id = $request->driver_id;

        try {
            $carburant->save();
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
