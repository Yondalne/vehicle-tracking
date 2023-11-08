<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Localization;
use App\Models\Vehicle;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function maps(Request $request) {

        $date = date('Y-m-d');
        if (!empty($request->date)) {
            $date = $request->date;
        }

        $thedriver = null;
        if (!empty($request->driver_id)) {
            $thedriver = Driver::find($request->driver_id);
        }

        $drivers = Driver::all();

        $localisations = Localization::where('driver_id', $thedriver ? $thedriver->id : null)->where('date', $date)->orderBy('id', "asc")->get();
        // dd(!empty($localisations->toArray()));
        $initial = !empty($localisations->toArray()) ? $localisations[0] : new Localization([
            'longitude' => -3.9984312,
            'latitude' => 5.2911346,
        ]);

        return view('maps', compact('localisations', 'initial', 'drivers', 'date', 'thedriver'));
    }
}
