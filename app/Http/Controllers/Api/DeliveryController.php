<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Delivery;

class DeliveryController extends Controller
{
    public function index(Request $request)
    {
        $data = Delivery::query()
            ->include($request->query('include'))
            ->filter($request->query('filter'))
            ->sort($request->query('sort'))
            ->get();

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'users_iduser' => 'required|integer|exists:users,iduser',
            'orders_idorder' => 'required|integer|exists:orders,idorder',
            'vehicles_idvehicle' => 'required|integer|exists:vehicles,idvehicle',
            'status' => 'required|string|max:45'
        ]);

        $delivery = Delivery::create($data);
        return response()->json($delivery, 201);
    }

    public function show($id)
    {
        return response()->json(Delivery::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $delivery = Delivery::findOrFail($id);
        $delivery->update($request->all());
        return response()->json($delivery);
    }

    public function destroy($id)
    {
        Delivery::destroy($id);
        return response()->json(['message' => 'Entrega eliminada correctamente']);
    }
}
