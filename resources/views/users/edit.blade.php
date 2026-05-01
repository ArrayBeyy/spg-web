@extends('layouts.app')

@section('content')

<h1 class="mb-4 font-bold">Edit SPG</h1>

<div class="card">

    {{-- ERROR VALIDATION --}}
    @if ($errors->any())
        <div class="bg-red-500 text-white p-3 mb-3 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('PUT')

        {{-- NAME --}}
        <input 
            type="text" 
            name="name" 
            value="{{ old('name', $user->name) }}"
            class="input mb-2 w-full"
            placeholder="Nama SPG"
            required
        >

        {{-- EMAIL --}}
        <input 
            type="email" 
            name="email" 
            value="{{ old('email', $user->email) }}"
            class="input mb-2 w-full"
            placeholder="Email"
            required
        >

        {{-- PASSWORD (OPSIONAL) --}}
        <input 
            type="password" 
            name="password"
            class="input mb-2 w-full"
            placeholder="Kosongkan jika tidak diubah"
        >

        {{-- BRANCH --}}
        <select name="branch_id" class="input mb-3 w-full">
            <option value="">-- Pilih Cabang --</option>
            @foreach($branches as $branch)
                <option value="{{ $branch->id }}"
                    {{ old('branch_id', $user->branch_id) == $branch->id ? 'selected' : '' }}>
                    {{ $branch->name }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="btn-primary">
            Update
        </button>

    </form>
</div>

@endsection