@extends('layouts.app')

@section('content')

<div class="page-header">
    <h1>Branches</h1>

    <a href="{{ route('branches.create') }}" class="btn-primary">
        + Tambah Branch
    </a>
</div>

@if(session('success'))
    <div class="alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <table class="table">
        <thead>
            <tr>
                <th>Nama Cabang</th>
                <th>Lokasi</th>
                <th width="180">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($branches as $branch)
            <tr>
                <td class="fw">{{ $branch->name }}</td>
                <td>{{ $branch->location }}</td>

                <td>
                    <div class="action-group">
                        <a href="{{ route('branches.edit', $branch->id) }}" class="btn-edit">
                            Edit
                        </a>

                        <form action="{{ route('branches.destroy', $branch->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="btn-delete" onclick="return confirm('Hapus?')">
                                Delete
                            </button>
                        </form>
                    </div>
                </td>
            </tr>

            @empty
            <tr>
                <td colspan="3" class="empty">Belum ada branch</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection