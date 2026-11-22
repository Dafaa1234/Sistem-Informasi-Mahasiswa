
@extends('layouts.sim')

@section('title', 'Edit Mahasiswa')

@section('content')

<div class="page-heading">
    <div>
        <h1>Edit Data Mahasiswa</h1>
        <p class="muted">Perbarui informasi mahasiswa.</p>
    </div>
</div>

<div class="card">

    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label>NIM</label>
            <input type="text" name="nim"
                   value="{{ old('nim', $mahasiswa->nim) }}">

            @error('nim')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Nama Mahasiswa</label>
            <input type="text" name="nama"
                   value="{{ old('nama', $mahasiswa->nama) }}">

            @error('nama')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Program Studi</label>
            <input type="text" name="prodi"
                   value="{{ old('prodi', $mahasiswa->prodi) }}">
        </div>

        <div class="form-group">
            <label>Angkatan</label>
            <input type="text" name="angkatan"
                   value="{{ old('angkatan', $mahasiswa->angkatan) }}">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email"
                   value="{{ old('email', $mahasiswa->email) }}">

            @error('email')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" rows="4">{{ old('alamat', $mahasiswa->alamat) }}</textarea>
        </div>

        <button type="submit" class="btn primary">
            Simpan Perubahan
        </button>

        <a href="{{ route('mahasiswa.index') }}" class="btn secondary">
            Kembali
        </a>

    </form>

</div>

@endsection
