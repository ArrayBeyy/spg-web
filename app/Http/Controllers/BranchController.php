<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::latest()->get();
        return view('branches.index', compact('branches'));
    }

    public function create()
    {
        return view('branches.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'location' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:5'
    ]);

    // 🔥 1. Buat cabang dulu
    $branch = Branch::create([
        'name' => $request->name,
        'location' => $request->location
    ]);

    // 🔥 2. Buat akun cabang (branch_admin)
    User::create([
        'name' => $request->name . ' Admin',
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'branch_admin',
        'branch_id' => $branch->id
    ]);

    return redirect()->route('branches.index')
        ->with('success', 'Cabang + akun login berhasil dibuat');
}

    public function edit(Branch $branch)
    {
        return view('branches.edit', compact('branch'));
    }

    public function update(Request $request, Branch $branch)
    {
        $branch->update($request->all());

        return redirect()->route('branches.index')->with('success', 'Berhasil update');
    }

    public function destroy(Branch $branch)
    {
        $branch->delete();

        return back()->with('success', 'Berhasil hapus');
    }
}