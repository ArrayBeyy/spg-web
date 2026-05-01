@extends('layouts.app')

@section('content')

<h1 class="mb-4 font-bold">Tambah SPG</h1>

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

    <form method="POST" action="{{ route('users.store') }}">
        @csrf

        {{-- NAME --}}
        <input 
            type="text" 
            name="name" 
            value="{{ old('name') }}"
            class="input mb-2 w-full"
            placeholder="Nama SPG"
            required
        >

        {{-- EMAIL --}}
        <input 
            type="email" 
            name="email" 
            value="{{ old('email') }}"
            class="input mb-2 w-full"
            placeholder="Email"
            required
        >

        {{-- PASSWORD --}}
        <input 
            type="password" 
            name="password"
            class="input mb-2 w-full"
            placeholder="Password"
            required
        >

        {{-- BRANCH --}}
        <select name="branch_id" class="input mb-3 w-full">
            <option value="">-- Pilih Cabang --</option>
            @foreach($branches as $branch)
                <option value="{{ $branch->id }}" {{ old('branch_id') == $branch->id ? 'selected' : '' }}>
                    {{ $branch->name }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="btn-primary">
            Simpan
        </button>

    </form>
</div>

@endsection