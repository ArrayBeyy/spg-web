<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $products = Product::with(['stocks' => function ($q) use ($user) {
            $q->where('branch_id', $user->branch_id);
        }])->get();

        $data = $products->map(function ($p) {
            return [
                'id' => $p->id,
                'name' => $p->name,
                'stock' => optional($p->stocks->first())->quantity ?? 0
            ];
        });

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0'
        ]);

        $user = $request->user();

        $product = Product::create([
            'name' => $data['name']
        ]);

        Stock::create([
            'product_id' => $product->id,
            'branch_id' => $user->branch_id,
            'quantity' => $data['quantity']
        ]);

        return response()->json([
            'message' => 'Product berhasil ditambahkan',
            'data' => $product
        ]);
    }

    public function show(Product $product)
    {
        return response()->json(
            $product->load('stocks')
        );
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0'
        ]);

        $user = $request->user();

        $product = Product::findOrFail($id);

        $product->update([
            'name' => $data['name']
        ]);

        $stock = Stock::where('product_id', $product->id)
            ->where('branch_id', $user->branch_id)
            ->first();

        if ($stock) {
            $stock->update([
                'quantity' => $data['quantity']
            ]);
        } else {
            Stock::create([
                'product_id' => $product->id,
                'branch_id' => $user->branch_id,
                'quantity' => $data['quantity']
            ]);
        }

        return response()->json([
            'message' => 'Product berhasil diupdate'
        ]);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json([
            'message' => 'Product dihapus'
        ]);
    }
}