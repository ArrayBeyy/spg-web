<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role == 'branch_admin') {
            // 🔥 hanya lihat SPG cabangnya
            $users = User::with('branch')
                ->where('role', 'spg')
                ->where('branch_id', $user->branch_id)
                ->get();
        } else {
            // 🔥 admin lihat semua SPG
            $users = User::with('branch')
                ->where('role', 'spg')
                ->get();
        }

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $branches = Branch::all();
        return view('users.create', compact('branches'));
    }

    public function store(Request $request)
    {
        $userLogin = auth()->user();

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'branch_id' => 'nullable'
        ]);

        $data['password'] = Hash::make($data['password']);
        $data['role'] = 'spg';

        // 🔥 kalau branch admin → paksa cabangnya sendiri
        if ($userLogin->role == 'branch_admin') {
            $data['branch_id'] = $userLogin->branch_id;
        }

        User::create($data);

        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        $branches = Branch::all();
        return view('users.edit', compact('user', 'branches'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'branch_id' => 'nullable'
        ]);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }
}