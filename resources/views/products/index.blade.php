@extends('layouts.app')

@section('content')

<div class="main-content">

    {{-- HEADER --}}
    <div class="page-header">
        <h1>Products</h1>

        <a href="{{ route('products.create') }}" class="btn-primary">
            + Tambah Product
        </a>
    </div>

    {{-- ALERT --}}
    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- TABLE --}}
    <div class="card">
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Product</th>
                    <th>Stock</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($products as $product)
                <tr>
                    <td class="fw">{{ $product->name }}</td>

                    {{-- STOCK --}}
                    <td>
                        {{ optional($product->stocks->first())->quantity ?? 0 }}
                    </td>

                    <td>
                        <div class="action-group">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn-edit">
                                Edit
                            </a>

                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn-delete" onclick="return confirm('Hapus data?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>

                @empty
                <tr>
                    <td colspan="3" class="empty">Belum ada product</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection