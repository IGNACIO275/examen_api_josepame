<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    public function index(Request $request)
    {
        $data = Vehicle::query()
            ->include($request->query('include'))
            ->filter($request->query('filter'))
            ->sort($request->query('sort'))
            ->get();

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'plate' => 'required|string|max:20|unique:vehicles,plate',
            'type' => 'required|string|max:45',
            'model' => 'required|string|max:45',
            'status' => 'required|string|max:45'
        ]);

        $vehicle = Vehicle::create($data);
        return response()->json($vehicle, 201);
    }

    public function show($id)
    {
        return response()->json(Vehicle::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->update($request->all());
        return response()->json($vehicle);
    }

    public function destroy($id)
    {
        Vehicle::destroy($id);
        return response()->json(['message' => 'Vehículo eliminado correctamente']);
    }
}
