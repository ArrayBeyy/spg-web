<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use App\Models\Branch;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        if (auth()->check() && auth()->user()->role != 'admin') {
            abort(403);
        }
    }

    public function index()
    {
        $products = Product::with('stocks')->latest()->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $branches = Branch::all();
        return view('products.create', compact('branches'));
    }

public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required',
        'quantity' => 'required|integer|min:0',
        'branch_id' => 'required|exists:branches,id'
    ]);

    $product = Product::create([
        'name' => $data['name']
    ]);

    Stock::create([
        'product_id' => $product->id,
        'branch_id' => $data['branch_id'],
        'quantity' => $data['quantity']
    ]);

    return redirect()->route('products.index')
        ->with('success', 'Berhasil tambah product');
}

public function edit(Product $product)
{
    $branches = Branch::all();
    $product->load('stocks');

    return view('products.edit', compact('product', 'branches'));
}

    public function update(Request $request, Product $product)
{
    $data = $request->validate([
        'name' => 'required',
        'quantity' => 'required|integer|min:0',
        'branch_id' => 'required|exists:branches,id'
    ]);

    $product->update([
        'name' => $data['name']
    ]);

    $stock = Stock::where('product_id', $product->id)
        ->where('branch_id', $data['branch_id'])
        ->first();

    if ($stock) {
        $stock->update([
            'quantity' => $data['quantity']
        ]);
    } else {
        Stock::create([
            'product_id' => $product->id,
            'branch_id' => $data['branch_id'],
            'quantity' => $data['quantity']
        ]);
    }

    return redirect()->route('products.index')
        ->with('success', 'Update berhasil');
}

    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success', 'Hapus berhasil');
    }
}