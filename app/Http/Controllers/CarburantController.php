<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carburant;
use App\Models\Driver;
use Illuminate\Support\Facades\DB;
use App\Models\Vehicle;
use Exception;

class CarburantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carburants = Carburant::all();
        $drivers = Driver::all();
        $vehicles = Vehicle::all();

        $results = DB::table('carburants')
            ->join('vehicles', 'carburants.vehicle_id', '=', 'vehicles.id')
            ->join('drivers', 'carburants.driver_id', '=', 'drivers.id')
            ->select('vehicles.serial as Immatriculation', DB::raw('CONCAT(drivers.first_name, " ", drivers.second_name) as Nom_Prenoms'), DB::raw('SUM(carburants.montant) as Total'))
            ->groupBy('vehicles.id', 'drivers.id')
            ->get();

        $totalM = 0;
        foreach ($results as $result) {
            $totalM += $result->Total;
        }

        return view('vehicle.fuel', [
            'carburants' => $carburants,
            'drivers' => $drivers,
            'vehicles' => $vehicles,
            'results' => $results,
            'totalM' => $totalM
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function search(Request $request)
    {
        $carburants = Carburant::all();
        $drivers = Driver::all();
        $vehicles = Vehicle::all();

        $request->validate([
            "driver_id" => "required",
            "datedebut" => "required",
            "datefin" => "required"
        ]);

        $results = DB::table('carburants')
            ->join('vehicles', 'carburants.vehicle_id', '=', 'vehicles.id')
            ->join('drivers', 'carburants.driver_id', '=', 'drivers.id')
            ->where('drivers.id', $request->driver_id)
            ->whereBetween('carburants.date', [$request->datedebut, $request->datefin])
            ->groupBy('vehicles.id', 'drivers.id', )

            ->selectRaw('CONCAT(drivers.first_name, " ", drivers.second_name) as Nom_Prenoms')
            ->selectRaw('vehicles.serial as Immatriculation')
            ->selectRaw('SUM(carburants.montant) as Total')
            ->get();

        $totalM = 0;
        foreach ($results as $result) {
            $totalM += $result->Total;
        }

        return view('vehicle.maintenance', [
            'carburants' => $carburants,
            'drivers' => $drivers,
            'vehicles' => $vehicles,
            'results' => $results,
            'totalM' => $totalM
        ]);
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

        // try {
            $carburant->save();
            return response()->json(["message" => "Success"], 200);
        // } catch (Exception $e) {
            // return response()->json(["message" => $e], 401);
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
