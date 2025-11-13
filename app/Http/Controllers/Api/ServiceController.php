<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $data = Service::query()
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

        $service = Service::create($data);
        return response()->json($service, 201);
    }

    public function show($id)
    {
        return response()->json(Service::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $service->update($request->all());
        return response()->json($service);
    }

    public function destroy($id)
    {
        Service::destroy($id);
        return response()->json(['message' => 'Servicio eliminado correctamente']);
    }
}
