<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chauffeur;

class ChauffeurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $chauffeur = Chauffeur::get();
       return response()->json([
        "status" => 1,
        "message" => "Liste vehicules",
        "data" =>$chauffeur
       ], 200);
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            "nom" => "required",
            "prenom" => "required",
            "numpieceid" => "required",
            "adresse" => "required",
            "salaire" => "required",
            "login_chauffeur" => "required",
            "mot_de_passe" => "required",
            "date_de_naissance" => "required",
            "telephone" => "required"

        ]);

        $chauffeur = new Chauffeur();
        $chauffeur -> nom = $request->nom;
        $chauffeur -> prenom = $request->prenom;
        $chauffeur -> numpieceid = $request->numpieceid;
        $chauffeur -> adresse = $request->adresse;
        $chauffeur -> salaire = $request->salaire;
        $chauffeur -> login_chauffeur = $request->login_chauffeur;
        $chauffeur -> mot_de_passe = $request->mot_de_passe;
        $chauffeur -> date_de_naissance = $request->date_de_naissance;
        $chauffeur -> telephone = $request->telephone;

        $chauffeur->save();
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $chauffeur = Chauffeur::where("id", $id)->exists();

       if ($chauffeur) {
            $info = chauffeur::find($id);
        return response()->json([
            "status" => 1,
            "message" => "chauffeur trouvé",
            "data" =>$info
           ], 200);
       }else {
        return response()->json([
            "status" => 0,
            "message" => "chauffeur introuvable"
           ], 404);
       }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $chauffeur = Chauffeur::where("id", $id)->exists();

        if ($chauffeur) {

            $info = Chauffeur::find($id);
            $info -> nom = $request->nom;
            $info -> prenom = $request->prenom;
            $info -> numpieceid = $request->numpieceid;
            $info -> adresse = $request->adresse;
            $info -> salaire = $request->salaire;
            $info -> login_chauffeur = $request->login_chauffeur;
            $info -> mot_de_passe = $request->mot_de_passe;
            $info -> date_de_naissance = $request->date_de_naissance;
            $info -> telephone = $request->telephone;
    
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
        if ($chauffeur = Chauffeur::where("id", $id)->exists()) {
            $chauffeur = Chauffeur::find($id);

            $chauffeur->delete();
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
