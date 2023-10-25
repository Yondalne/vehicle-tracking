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
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Get the data from the request
        

        // Create a new Post instance and put the requested data to the corresponding column
        $vehicule = new Vehicule;
        $vehicule->nom = $nom;
        $vehicule->puissance = $puissance;
        $vehicule->couleur = $couleur;
        $vehicule->salaire = $salaire;
        $vehicule->marque = $marque;
        $vehicule->annee_premiere_mise_en_circulation = $annee_premiere_mise_en_circulation;
       
        
      

        // Save the data
        $vehicule->save();

        return redirect()->route('vehicule.index');
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
