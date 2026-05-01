@extends('layouts.app')

@section('content')

<div class="main-content">

    <div class="page-header">
        <h1>Tambah Product</h1>
    </div>

    <div class="card form-card">
        <form action="{{ route('products.store') }}" method="POST">
            @csrf

            {{-- NAMA --}}
            <div class="form-group">
                <label>Nama Product</label>
                <input 
                    type="text" 
                    name="name"
                    class="input"
                    placeholder="Masukkan nama product"
                    required
                >
            </div>

            {{-- STOCK --}}
            <div class="form-group">
                <label>Stock</label>
                <input 
                    type="number" 
                    name="quantity"
                    class="input"
                    placeholder="Masukkan stok"
                    required
                >
            </div>

            {{-- BRANCH --}}
            <div class="form-group">
                <label>Cabang</label>
                <select name="branch_id" class="input" required>
                    <option value="">-- Pilih Cabang --</option>
                    @foreach($branches as $branch)
                        <option value="{{ $branch->id }}">
                            {{ $branch->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-actions">
                <button class="btn-primary">Simpan</button>

                <a href="{{ route('products.index') }}" class="btn-secondary">
                    Kembali
                </a>
            </div>

        </form>
    </div>

</div>

@endsection