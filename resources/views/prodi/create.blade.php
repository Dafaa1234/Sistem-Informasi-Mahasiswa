
@extends('layouts.sim')

@section('title', 'Tambah Program Studi')

@section('content')

<div class="page-heading">
    <div>
        <h1>Tambah Program Studi</h1>
        <p class="muted">Masukkan informasi program studi baru.</p>
    </div>
</div>

<div class="card">

    <form action="{{ route('prodi.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Kode Program Studi</label>
            <input type="text" name="kode"
                   value="{{ old('kode') }}"
                   placeholder="Contoh: TI">

            @error('kode')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Nama Program Studi</label>
            <input type="text" name="nama"
                   value="{{ old('nama') }}"
                   placeholder="Contoh: Teknik Informatika">

            @error('nama')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn primary">
            Simpan Data
        </button>

        <a href="{{ route('prodi.index') }}" class="btn secondary">
            Kembali
        </a>
    </form>

</div>

@endsection
