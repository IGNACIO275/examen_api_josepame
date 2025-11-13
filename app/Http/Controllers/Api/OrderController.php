<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $data = Order::query()
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
            'total' => 'required|numeric|min:0',
            'status' => 'required|string|max:45'
        ]);

        $order = Order::create($data);
        return response()->json($order, 201);
    }

    public function show($id)
    {
        return response()->json(Order::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->all());
        return response()->json($order);
    }

    public function destroy($id)
    {
        Order::destroy($id);
        return response()->json(['message' => 'Orden eliminada correctamente']);
    }
}
