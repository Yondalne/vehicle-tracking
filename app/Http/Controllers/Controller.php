<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Localization;
use App\Models\Vehicle;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function maps(Driver $driver, Vehicle $vehicle, $date = null) {

        if (empty($date)) {
            $date = date('Y-m-d');
        }
        // for ($i = 0; $i < 10; $i++) {
        //     $data = [
        //         'vehicle_id' => 1,
        //         'driver_id' => 1,
        //         'longitude' => -3.980665 - ($i * 1),
        //         'latitude' => 5.388055 + ($i * 1),
        //         'date' => date('Y-m-d'),
        //         'is_start' => $i == 0 ? 1 : 0,
        //     ];
        //     Localization::create($data);
        // }

        $localisations = Localization::where('vehicle_id', $vehicle->id)->where('driver_id', $driver->id)->where('date', $date)->orderBy('id', "asc")->get();
        $initial = $localisations[0];
        return view('maps', compact('localisations', 'initial'));
    }
}
