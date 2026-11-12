
@extends('layouts.sim')

@section('title', 'Tambah Mahasiswa')

@section('content')

<div class="page-heading">
    <div>
        <h1>Tambah Mahasiswa</h1>
        <p class="muted">Masukkan informasi mahasiswa baru.</p>
    </div>
</div>

<div class="card">

    <form action="{{ route('mahasiswa.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>NIM</label>
            <input type="text" name="nim"
                   value="{{ old('nim') }}"
                   placeholder="Masukkan NIM">

            @error('nim')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Nama Mahasiswa</label>
            <input type="text" name="nama"
                   value="{{ old('nama') }}"
                   placeholder="Masukkan nama mahasiswa">

            @error('nama')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Program Studi</label>
            <input type="text" name="prodi"
                   value="{{ old('prodi') }}"
                   placeholder="Contoh: Teknik Informatika">
        </div>

        <div class="form-group">
            <label>Angkatan</label>
            <input type="text" name="angkatan"
                   value="{{ old('angkatan') }}"
                   placeholder="Contoh: 2024">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email"
                   value="{{ old('email') }}"
                   placeholder="Masukkan email mahasiswa">

            @error('email')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" rows="4">{{ old('alamat') }}</textarea>
        </div>

        <button type="submit" class="btn primary">
            Simpan Mahasiswa
        </button>

        <a href="{{ route('mahasiswa.index') }}" class="btn secondary">
            Kembali
        </a>

    </form>

</div>

@endsection
