@extends('layouts.app')

@section('content')

<div class="main-content">

    <div class="page-header">
        <h1>Edit Product</h1>
    </div>

    <div class="card form-card">
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- NAMA --}}
            <div class="form-group">
                <label>Nama Product</label>
                <input 
                    type="text" 
                    name="name"
                    value="{{ $product->name }}"
                    class="input"
                    required
                >
            </div>

            {{-- BRANCH --}}
            @php
                $selectedBranch = $product->stocks->first()->branch_id ?? null;
            @endphp

            <div class="form-group">
                <label>Cabang</label>
                <select name="branch_id" class="input" required>
                    @foreach($branches as $branch)
                        <option value="{{ $branch->id }}"
                            {{ $selectedBranch == $branch->id ? 'selected' : '' }}>
                            {{ $branch->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- STOCK --}}
            @php
                $stock = $product->stocks->first()->quantity ?? 0;
            @endphp

            <div class="form-group">
                <label>Stock</label>
                <input 
                    type="number" 
                    name="quantity"
                    value="{{ $stock }}"
                    class="input"
                    required
                >
            </div>

            <div class="form-actions">
                <button class="btn-primary">Update</button>

                <a href="{{ route('products.index') }}" class="btn-secondary">
                    Kembali
                </a>
            </div>

        </form>
    </div>

</div>

@endsection