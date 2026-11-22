
@extends('layouts.sim')

@section('title', 'Edit Program Studi')

@section('content')

<div class="page-heading">
    <div>
        <h1>Edit Program Studi</h1>
        <p class="muted">Perbarui informasi program studi.</p>
    </div>
</div>

<div class="card">

    <form action="{{ route('prodi.update', $prodi->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Kode Program Studi</label>
            <input type="text" name="kode"
                   value="{{ old('kode', $prodi->kode) }}">

            @error('kode')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Nama Program Studi</label>
            <input type="text" name="nama"
                   value="{{ old('nama', $prodi->nama) }}">

            @error('nama')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn primary">
            Perbarui Data
        </button>

        <a href="{{ route('prodi.index') }}" class="btn secondary">
            Kembali
        </a>

    </form>

</div>

@endsection
