<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\Stock;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        return response()->json(
            Sale::with('user', 'product')->latest()->get()
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|integer|min:1',
        ]);

        // 🔥 ambil user dari login (bukan dari request)
        $user = $request->user();

        // 🔥 cek stok berdasarkan cabang user
        $stock = Stock::where('product_id', $data['product_id'])
            ->where('branch_id', $user->branch_id)
            ->first();

        if (!$stock || $stock->quantity < $data['qty']) {
            return response()->json([
                'message' => 'Stok tidak cukup'
            ], 400);
        }

        // 🔥 kurangi stok
        $stock->decrement('quantity', $data['qty']);

        // 🔥 simpan penjualan
        $sale = Sale::create([
            'user_id' => $user->id,
            'product_id' => $data['product_id'],
            'qty' => $data['qty'],
            'sold_at' => now(),
            'branch_id' => $user->branch_id, // 🔥 penting
        ]);

        return response()->json([
            'message' => 'Berhasil',
            'data' => $sale
        ]);
    }

    public function show(Sale $sale)
    {
        return response()->json(
            $sale->load('user', 'product')
        );
    }

    public function destroy(Sale $sale)
    {
        $sale->delete();

        return response()->json([
            'message' => 'Deleted'
        ]);
    }
    public function report(Request $request)
    {
        $user = $request->user();

        $sales = Sale::with('product')
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        return response()->json($sales);
    }
}