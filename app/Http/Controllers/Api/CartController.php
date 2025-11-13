<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $data = Cart::query()
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
            'products_idproduct' => 'required|integer|exists:products,idproduct',
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = Cart::create($data);
        return response()->json($cart, 201);
    }

    public function show($id)
    {
        return response()->json(Cart::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $cart = Cart::findOrFail($id);
        $cart->update($request->all());
        return response()->json($cart);
    }

    public function destroy($id)
    {
        Cart::destroy($id);
        return response()->json(['message' => 'Carrito eliminado correctamente']);
    }
}
