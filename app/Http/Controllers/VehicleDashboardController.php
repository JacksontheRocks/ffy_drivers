<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
use Illuminate\Support\Facades\Auth;

class VehicleDashboardController extends Controller
{
    public function show()
    {
        $driver = auth()->user();
        $selectedVehicle = $driver->activeVehicle; // Obtener el vehículo seleccionado

        return view('dashboard', [
            'vehicles' => $driver->vehicles,
            'selectedVehicle' => $selectedVehicle, // Pasar el vehículo seleccionado a la vista
        ]);
    }

    public function selectVehicle(Request $request)
    {
        $driver = auth()->user();
        $driver->active_vehicle_id = $request->vehicle_id;
        $driver->save();

        return redirect()->back()->with('success', 'Vehículo seleccionado correctamente.');
    }

    public function deactivateVehicle(Request $request)
    {
        $driver = Auth::user();
        $driver->active_vehicle_id = null;
        $driver->save();

        return redirect()->route('dashboard')->with('success', 'Vehículo desactivado correctamente.');
    }
}
