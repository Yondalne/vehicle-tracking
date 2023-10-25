<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chauffeur;

class ChauffeurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
       $chauffeur = Chauffeur::all();
      
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
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Get the data from the request
        $nom = $request->input('nom');
        $prenom = $request->input('prenom');
        $numpieceid = $request->input('numpieceid');
        $salaire = $request->input('salaire');
        $adresse = $request->input('adresse');
        $mot_de_passe = $request->input('mot_de_passe');
        $date_de_naissance = $request->input('date_de_naissance');
        $telephone = $request->input('telephone');

        // Create a new Post instance and put the requested data to the corresponding column
        $chauffeur = new Chauffeur;
        $chauffeur->nom = $nom;
        $chauffeur->prenom = $prenom;
        $chauffeur->numpieceid = $numpieceid;
        $chauffeur->salaire = $salaire;
        $chauffeur->adresse = $adresse;
        $chauffeur->mot_de_passe = $mot_de_passe;
        $chauffeur->date_de_naissance = $date_de_naissance;
        $chauffeur->telephone = $telephone;
        
      

        // Save the data
        $chauffeur->save();

        return redirect()->route('chauffeur.index');
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
    public function update(Request $request, string $id): RedirectResponse
    {
        // Get the data from the request
        $nom = $request->input('nom');
        $prenom = $request->input('prenom');
        $numpieceid = $request->input('numpieceid');
        $salaire = $request->input('salaire');
        $adresse = $request->input('adresse');
        $mot_de_passe = $request->input('mot_de_passe');
        $date_de_naissance = $request->input('date_de_naissance');
        $telephone = $request->input('telephone');

        // Find the requested post and put the requested data to the corresponding column
        $chauffeur = Chauffeur::all()->find($id);;
        $chauffeur->nom = $nom;
        $chauffeur->prenom = $prenom;
        $chauffeur->numpieceid = $numpieceid;
        $chauffeur->salaire = $salaire;
        $chauffeur->adresse = $adresse;
        $chauffeur->mot_de_passe = $mot_de_passe;
        $chauffeur->date_de_naissance = $date_de_naissance;
        $chauffeur->telephone = $telephone;

        // Save the data
        $chauffeur->save();

        return redirect()->route('chauffeur.show', ['chauffeur' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $chauffeur = Chauffeur::all()->find($id);

        $chauffeur->delete();

        return redirect()->route('chauffeur.index');
    }
}
