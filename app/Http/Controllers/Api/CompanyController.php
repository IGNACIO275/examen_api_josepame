<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        $data = Company::query()
            ->include($request->query('include'))
            ->filter($request->query('filter'))
            ->sort($request->query('sort'))
            ->get();

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'company_name' => 'required|string|max:45',
            'legal_representative_lastname' => 'required|string|max:45',
            'person_type' => 'required|string|max:45',
            'legal_representative_email' => 'required|email',
            'billing_address' => 'required|string|max:255',
            'users_iduser' => 'required|integer|exists:users,iduser'
        ]);

        $company = Company::create($data);
        return response()->json($company, 201);
    }

    public function show($id)
    {
        return response()->json(Company::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);
        $company->update($request->all());
        return response()->json($company);
    }

    public function destroy($id)
    {
        Company::destroy($id);
        return response()->json(['message' => 'Compañía eliminada correctamente']);
    }
}
