<?php

namespace App\Http\Controllers;

use App\Models\Drive;
use App\Models\Driver;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function loginDriver(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); // Réponse JSON avec les erreurs de validation
        }
        $credentials = $request->only('email', 'password');

        if (Auth::guard('driver')->attempt($credentials)) {
            $token = auth()->guard('driver')->user()->createToken('MyApp')->plainTextToken;
            return response()->json([
                'access_token' => $token,
                'user' => auth()->guard('driver')->user(),
                'vehicle' => (Drive::where('driver_id', auth()->guard('driver')->user()->id)->orderBy('id', 'desc')->first()) ?(Drive::where('driver_id', auth()->guard('driver')->user()->id)->orderBy('id', 'desc')->first())->vehicle : [],
                'status' => 200,
            ], 200);
        }

        return response()->json([
            'error' => 'Unauthorized',
            'status' => 401,
        ], 401);
    }


    public function logout(Request $request)
    {
        Auth::guard('driver')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function registerDriver(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'second_name' => 'required|string',
            'birthday' => 'required|date',
            'cni' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
            'salary' => 'required|string',
            'email' => 'required|email|unique:drivers,email',
            'password' => 'required|string|min:8',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); // Réponse JSON avec les erreurs de validation
        }
        $driver = Driver::create([
            'first_name' => $request->input('first_name'),
            'second_name' => $request->input('second_name'),
            'birthday' => $request->input('birthday'),
            'cni' => $request->input('cni'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'salary' => $request->input('salary'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        // Authentifiez automatiquement l'utilisateur après l'inscription (facultatif)
        // auth()->guard('driver')->login($driver);

        return response()->json(['message' => 'Inscription réussie'], 200);
    }

    public function login(Request $request) {
        $request->validate([
            "email" => "required",
            "password" => "required",
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect("/dashboard");
        }

        return back()->withErrors([
            'email' => "Les informations de connexions sont incorrectes",
        ]);
    }

    public function logoutAdmin() {
        Auth::logout();
        return redirect('/login');
    }
}
