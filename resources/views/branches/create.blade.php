@extends('layouts.app')

@section('content')

<div class="page-header">
    <h1>Tambah Branch</h1>
</div>

<div class="card form-card">
    <form action="{{ route('branches.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Nama Cabang</label>
            <input type="text" name="name" class="input" required>
        </div>

        <div class="form-group">
            <label>Lokasi</label>
            <input type="text" name="location" class="input" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="input" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="input" required>
        </div>

        <button class="btn-primary">Simpan</button>
    </form>
</div>

@endsection