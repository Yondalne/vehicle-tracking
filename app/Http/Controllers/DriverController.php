<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;

use App\Models\Driver;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $drivers = Driver::all(); // Charger tous les véhicules depuis la base de données

        return view('driver.index', ['drivers' => $drivers]);

        }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('driver.create');

    }

    public function profil(){
        $viewData = [];
        $viewData["title"] = "Home Page - Online Store";
        return view('driver.profil')->with("viewData", $viewData);
    }

    public function sign(){
        $viewData = [];
        $viewData["title"] = "Home Page - Online Store";
        return view('driver.sign')->with("viewData", $viewData);
    }

    public function driverlist(){
        $viewDat = [];
        $viewDat["title"] = "Home Page - Online Stor";
        return view('driver.listing')->with("viewData", $viewDat);
    }

    public function store(Request $request): RedirectResponse
    {
        //dd($request->all());
        $request->validate([
            "first_name" => "required",
            "second_name" => "required",
            "cni" => "required",
            "address" => "required",
            "salary" => "required",
            "email" => "required",
            "birthday" => "required",
            "password" => "required",
            "phone" => "required"

        ]);
        // Get the data from the request
        $first_name = $request->input('first_name');
        $second_name = $request->input('second_name');
        $cni = $request->input('cni');
        $address = $request->input('address');
        $salary = $request->input('salary');
        $email = $request->input('email');
        $password = $request->input('password');
        $birthday = $request->input('birthday');
        $phone = $request->input('phone');

        // Create a new Driver instance and put the requested data to the corresponding column
        $driver = new Driver;
        $driver->second_name = $second_name;
        $driver->first_name = $first_name;
        $driver->cni = $cni;
        $driver->address = $address;
        $driver->salary = $salary;
        $driver->email = $email;
        $driver->password = $password;
        $driver->birthday = $birthday;
        $driver->phone = $phone;
        // Save the data
        $driver->save();



        return redirect()->route('driver.index');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $driver = Driver::all()->find($id);

        return view('driver.show', [
            'drivers' => $driver,
        ]);
    }

    public function edit(string $id){
        $driver = Driver::all()->find($id);

        return view('driver.edit', [
            'drivers' => $driver,
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $second_name = $request->input('second_name');
        $first_name = $request->input('first_name');
        $cni = $request->input('cni');
        $address = $request->input('address');
        $salary = $request->input('salary');
        $email = $request->input('email');
        $password = $request->input('password');
        $birthday = $request->input('birthday');
        $phone = $request->input('phone');


        $driver = Driver::all()->find($id);

        $driver->second_name = $second_name;
        $driver->first_name = $first_name;
        $driver->cni = $cni;
        $driver->address = $address;
        $driver->salary = $salary;
        $driver->email = $email;
        $driver->password = $password;
        $driver->birthday = $birthday;
        $driver->phone = $phone;



        // Save the data
        $driver->save();

        return redirect()->route('driver.show', ['drivers' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $driver = Driver::all()->find($id);

        $driver->delete();

        return redirect()->route('driver.index');
    }
}
