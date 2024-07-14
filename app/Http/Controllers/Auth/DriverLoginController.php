<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Driver;

class DriverLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('welcome');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nif_cif' => 'required|string',
            'password' => 'required|string',
        ]);

        $driver = Driver::where('nif_cif', $request->nif_cif)->first();

        if ($driver && Hash::check($request->password, $driver->password)) {
            // Autenticar al conductor
            Auth::login($driver);
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'nif_cif' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
