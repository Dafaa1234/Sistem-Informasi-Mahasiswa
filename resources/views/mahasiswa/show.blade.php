
@extends('layouts.sim')

@section('title', 'Detail Mahasiswa')

@section('content')

<div class="page-heading">
    <div>
        <h1>Detail Mahasiswa</h1>
        <p class="muted">Informasi lengkap mahasiswa.</p>
    </div>
</div>

<div class="card">

    <div class="form-group">
        <label>NIM</label>
        <p>{{ $mahasiswa->nim }}</p>
    </div>

    <div class="form-group">
        <label>Nama Mahasiswa</label>
        <p>{{ $mahasiswa->nama }}</p>
    </div>

    <div class="form-group">
        <label>Program Studi</label>
        <p>{{ $mahasiswa->prodi ?? '-' }}</p>
    </div>

    <div class="form-group">
        <label>Angkatan</label>
        <p>{{ $mahasiswa->angkatan ?? '-' }}</p>
    </div>

    <div class="form-group">
        <label>Email</label>
        <p>{{ $mahasiswa->email ?? '-' }}</p>
    </div>

    <div class="form-group">
        <label>Alamat</label>
        <p>{{ $mahasiswa->alamat ?? '-' }}</p>
    </div>

    <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}"
       class="btn primary">
        Edit Data
    </a>

    <a href="{{ route('mahasiswa.index') }}" class="btn secondary">
        Kembali
    </a>

</div>

@endsection
