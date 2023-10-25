<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carburant;

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
    public function create(Resquest $request)
    {
        $request->validate([
            "numfactCa" => "required",
            "nblitre" => "required",
            "montant" => "required",

        ]);

        $carburant = new Carburant();
        $carburant -> numfactCa = $request->numfactCa;
        $carburant -> nblitre = $request->nblitre;
        $carburant -> montant = $request->montant;
        

        $carburant->save();
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
