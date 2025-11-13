<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $data = Product::query()
            ->include($request->query('include'))
            ->filter($request->query('filter'))
            ->sort($request->query('sort'))
            ->get();

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:45',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'categories_idcategory' => 'required|integer|exists:categories,idcategory',
            'companies_idcompany' => 'required|integer|exists:companies,idcompany'
        ]);

        $product = Product::create($data);
        return response()->json($product, 201);
    }

    public function show($id)
    {
        return response()->json(Product::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return response()->json($product);
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return response()->json(['message' => 'Producto eliminado correctamente']);
    }
}
