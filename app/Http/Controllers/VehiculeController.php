<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicule;

class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $vehicule = Vehicule::get();
       return response()->json([
        "status" => 1,
        "message" => "Liste vehicules",
        "data" =>$vehicule
       ], 200);
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            "immatriculation_vehicule" => "required",
            "puissance" => "required",
            "couleur" => "required",
            "marque" => "required",
            "annee_premiere_mise_en_circulation" => "required"
        ]);

        $vehicule = new Vehicule();
        $vehicule -> immatriculation_vehicule = $request->immatriculation_vehicule;
        $vehicule -> puissance = $request->puissance;
        $vehicule -> couleur = $request->couleur;
        $vehicule -> marque = $request->marque;
        $vehicule -> annee_premiere_mise_en_circulation = $request->annee_premiere_mise_en_circulation;

        $vehicule->save();
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $vehicule = Vehicule::where("id", $id)->exists();

       if ($vehicule) {
            $info = Vehicule::find($id);
        return response()->json([
            "status" => 1,
            "message" => "vehicule trouvé",
            "data" =>$info
           ], 200);
       }else {
        return response()->json([
            "status" => 0,
            "message" => "Vehicule introuvable"
           ], 404);
       }
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $vehicule = Vehicule::where("id", $id)->exists();

        if ($vehicule) {

            $info = Vehicule::find($id);
            $info -> immatriculation_vehicule = $request->immatriculation_vehicule;
            $info -> puissance = $request->puissance;
            $info -> couleur = $request->couleur;
            $info -> marque = $request->marque;
            $info -> annee_premiere_mise_en_circulation = $request->annee_premiere_mise_en_circulation;
            $info->save();
            
        return response()->json([
            "status" => 1,
            "message" => "Mis à jour effectué"
           ]);
       }else {
        return response()->json([
            "status" => 0,
            "message" => "Mis à jour echoué"
           ]);
       }
       
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       if ($vehicule = Vehicule::where("id", $id)->exists()) {
             $vehicule = Vehicule::find($id);

             $vehicule->delete();
             return response()->json([
                "status" => 1,
                "message" => "Suppression réussie"
             ]);
       }else {
        return response()->json([
            "status" => 0,
            "message" => "Suppression échouée"
         ]);
       }
    }
}
