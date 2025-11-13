<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $data = Category::query()
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
            'description' => 'nullable|string|max:255',
            'companies_idcompany' => 'required|integer|exists:companies,idcompany'
        ]);

        $category = Category::create($data);
        return response()->json($category, 201);
    }

    public function show($id)
    {
        return response()->json(Category::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return response()->json($category);
    }

    public function destroy($id)
    {
        Category::destroy($id);
        return response()->json(['message' => 'Categoría eliminada correctamente']);
    }
}
