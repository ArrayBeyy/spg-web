@extends('layouts.app')

@section('content')

<div class="page-header">
    <h1>Edit Branch</h1>
</div>

<div class="card form-card">
    <form action="{{ route('branches.update', $branch->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nama Cabang</label>
            <input type="text" name="name" value="{{ $branch->name }}" class="input" required>
        </div>

        <div class="form-group">
            <label>Lokasi</label>
            <input type="text" name="location" value="{{ $branch->location }}" class="input" required>
        </div>

        <button class="btn-primary">Update</button>
    </form>
</div>

@endsection