<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        return Branch::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'location' => 'nullable',
        ]);

        return Branch::create($data);
    }

    public function show(Branch $branch)
    {
        return $branch->load('users');
    }

    public function update(Request $request, Branch $branch)
    {
        $branch->update($request->all());
        return $branch;
    }

    public function destroy(Branch $branch)
    {
        $branch->delete();
        return response()->noContent();
    }
}