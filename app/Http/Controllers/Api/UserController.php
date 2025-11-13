<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() { return response()->json(User::all()); }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:45',
            'lastname' => 'required|string|max:45',
            'email' => 'required|email|unique:users,email',
            'country' => 'required|string|max:45',
            'phone' => 'nullable|string|max:45',
            'password' => 'required|string|min:6'
        ]);

        $data['password'] = bcrypt($data['password']);

        return response()->json(User::create($data), 201);
    }

    public function show($id) { return response()->json(User::findOrFail($id)); }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return response()->json($user);
    }

    public function destroy($id)
    {
        User::destroy($id);
        return response()->json(['message' => 'Usuario eliminado']);
    }
}
