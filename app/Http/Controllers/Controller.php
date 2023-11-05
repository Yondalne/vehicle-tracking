<?php

namespace App\Http\Controllers;

use App\Models\Localization;
use App\Models\Vehicle;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function maps(Vehicle $vehicle) {

        // for ($i = 0; $i < 10; $i++) {
        //     $data = [
        //         'vehicle_id' => 1,
        //         'longitude' => -3.980665 - ($i * 1),
        //         'latitude' => 5.388055 + ($i * 1),
        //         'date' => date('Y-m-d'),
        //         'is_start' => $i == 0 ? 1 : 0,
        //         'is_end' => $i == 9 ? 1 : 0
        //     ];
        //     Localization::create($data);
        // }

        $localisations = $vehicle->localizations()->get()->groupBy('date')->first();
        $initial = $vehicle->localizations()->where('is_start', '<>', null)->orderBy('date', 'desc')->first();
        return view('maps', compact('localisations', 'initial'));
    }
}
