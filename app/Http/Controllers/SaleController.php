<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SaleController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role == 'spg') {
            // 🔥 SPG hanya lihat miliknya
            $sales = Sale::with('user', 'product')
                ->where('user_id', $user->id)
                ->latest()
                ->get();

        } elseif ($user->role == 'branch_admin') {
            // 🔥 Cabang lihat cabangnya
            $sales = Sale::with('user', 'product')
                ->where('branch_id', $user->branch_id)
                ->latest()
                ->get();

        } else {
            // 🔥 Admin lihat semua
            $sales = Sale::with('user', 'product')
                ->latest()
                ->get();
        }

        return view('sales.index', compact('sales'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        $data = $request->validate([
            'product_id' => 'required',
            'qty' => 'required|integer',
            'photo' => 'nullable|image|max:2048',
        ]);

        // 🔥 HANDLE UPLOAD FOTO
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('sales', 'public');
        }

        $data['user_id'] = $user->id;
        $data['branch_id'] = $user->branch_id;

        Sale::create($data);

        return back()->with('success', 'Sales berhasil ditambahkan');
    }
}