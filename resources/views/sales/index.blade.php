@extends('layouts.app')

@section('content')

<h1 class="mb-4 font-bold">Sales Data</h1>

<div class="card">
<table class="table">
<thead>
<tr>
<th>SPG</th>
<th>Product</th>
<th>Qty</th>
<th>Foto</th>
<th>Waktu</th>
</tr>
</thead>

<tbody>
@foreach($sales as $sale)
<tr>
<td>{{ $sale->user->name ?? '-' }}</td>
<td>{{ $sale->product->name ?? '-' }}</td>
<td>{{ $sale->qty }}</td>

<td>
    @if($sale->photo)
        <a href="{{ asset('storage/'.$sale->photo) }}" target="_blank">
            Lihat File
        </a>
    @else
        -
    @endif
</td>

<td>{{ $sale->created_at->format('d M Y H:i') }}</td>
</tr>
@endforeach
</tbody>
</table>
</div>

@endsection