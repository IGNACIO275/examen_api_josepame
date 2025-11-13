<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $data = Role::query()
            ->include($request->query('include'))
            ->filter($request->query('filter'))
            ->sort($request->query('sort'))
            ->get();

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $data = $request->validate(['name' => 'required|string|max:45']);
        $role = Role::create($data);
        return response()->json($role, 201);
    }

    public function show($id)
    {
        return response()->json(Role::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->update($request->all());
        return response()->json($role);
    }

    public function destroy($id)
    {
        Role::destroy($id);
        return response()->json(['message' => 'Rol eliminado correctamente']);
    }
}
