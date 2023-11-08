<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Maintenance;
use App\Models\Driver;
use App\Models\Vehicle;
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
        $vehicles= Vehicle::all();
    
        $results = DB::table('maintenances')
        ->join('vehicles', 'maintenances.vehicle_id', '=', 'vehicles.id')
        ->join('drivers', 'maintenances.driver_id', '=', 'drivers.id')
        ->select('vehicles.serial as Immatriculation', DB::Raw('CONCAT(drivers.first_name, " ", drivers.second_name) as Nom_Prenoms'), DB::Raw('SUM(maintenances.montantM) as Total'))
        ->groupBy('vehicles.id', 'drivers.id')
        ->get();

        $totalM = 0;
        foreach ($results as $result) {
            $totalM += $result->Total;
        }
            
        return view('vehicle.maintenance', ['maintenances' => $maintenances,
            'drivers'=>$drivers,
            'vehicles'=>$vehicles, 
            'results'=>$results,
            'totalM' => $totalM

    ]);

    }
    public function search(Request $request){

        $maintenances = Maintenance::all(); // Charger tous les véhicules depuis la base de données
        $drivers= Driver::all();
        $vehicles= Vehicle::all();

        $request->validate([
            "driver_id" => "required",
            "datedebut" => "required",
            "datefin" => "required"
        ]);

        $results = DB::table('maintenances')
        ->join('vehicles', 'maintenances.vehicle_id', '=', 'vehicles.id')
        ->join('drivers', 'maintenances.driver_id', '=', 'drivers.id')
        ->where('drivers.id', $request->driver_id)
        ->whereBetween('maintenances.c', [$request->datedebut, $request->datefin])
        ->groupBy('vehicles.id', 'drivers.id')
        ->selectRaw('CONCAT(drivers.first_name, " ", drivers.second_name) as Nom_Prenoms')
        ->selectRaw('vehicles.serial as Immatriulation')
        ->selectRaw('SUM(maintenances.montantM) as Total')
        ->get();

        $totalM = 0;
        foreach ($results as $result) {
            $totalM += $result->Total;
        }

        return redirect()->route('vehicle.maintenance', ['maintenances' => $maintenances,
        'drivers'=>$drivers,
        'vehicles'=>$vehicles, 
        'results'=>$results,
        'totalM' => $totalM]);
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
            "numfact" => "required",
            "repsais" => "required",
            "montantM" => "required",
            "vehicle_id" => "required",
            "driver_id" => "required",
        ]);

        $maintenance = new Maintenance();
        $maintenance -> numfact = $request->numfactCa;
        $maintenance -> repsais = $request->nblitre;
        $maintenance -> montantM = $request->montantM;
        $maintenance -> date = date('Y-m-d');

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
