<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function driverlist(): View
    {
      
        $driver = Driver::all();

        return view('driver.index', [
            'driver' => $driver,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('driver.create');

    }

    public function sign(Request $request): RedirectResponse
    {
        // Get the data from the request
        $second_name = $request->input('second_name');
        $first_name = $request->input('first_name');
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
            'driver' => $driver,
        ]);
    }

    public function edit(string $id){
        $driver = Driver::all()->find($id);

        return view('driver.edit', [
            'driver' => $driver,
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

        return redirect()->route('driver.show', ['driver' => $id]);
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
