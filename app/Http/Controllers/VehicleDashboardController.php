<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;

class VehicleDashboardController extends Controller
{
    public function show()
    {
        $driver = Auth::user();
        $vehicles = $driver->vehicles;
        return view('dashboard', compact('vehicles'));
    }

    public function selectVehicle(Request $request)
    {
        $driver = Auth::user();
        $vehicle = Vehicle::find($request->vehicle_id);
        
        if ($vehicle) {
            $driver->active_vehicle_id = $vehicle->id;
            $driver->save();
            return redirect()->route('dashboard')->with('success', 'Vehículo seleccionado correctamente.');
        }

        return redirect()->route('dashboard')->with('error', 'Vehículo no encontrado.');
    }
}
