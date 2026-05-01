@extends('layouts.app')

@section('content')

<div class="page-header">
    <h1>SPG Users</h1>

    <a href="{{ route('users.create') }}" class="btn-primary">
        + Tambah
    </a>
</div>

<div class="card">
<table class="table">
<thead>
<tr>
<th>Nama</th>
<th>Email</th>
<th>Cabang</th>
<th>Aksi</th>
</tr>
</thead>

<tbody>
@foreach($users as $user)
<tr>
<td class="fw">{{ $user->name }}</td>
<td>{{ $user->email }}</td>
<td>{{ $user->branch->name ?? '-' }}</td>
<td>
<div class="action-group">
<a href="{{ route('users.edit',$user->id) }}" class="btn-edit">Edit</a>

<form action="{{ route('users.destroy',$user->id) }}" method="POST">
@csrf @method('DELETE')
<button class="btn-delete">Delete</button>
</form>
</div>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>

@endsection