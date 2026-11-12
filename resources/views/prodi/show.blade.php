
@extends('layouts.sim')

@section('title', 'Detail Program Studi')

@section('content')

<div class="page-heading">
    <div>
        <h1>Detail Program Studi</h1>
        <p class="muted">Informasi lengkap program studi.</p>
    </div>
</div>

<div class="card">

    <div class="form-group">
        <label>Kode Program Studi</label>
        <p>{{ $prodi->kode }}</p>
    </div>

    <div class="form-group">
        <label>Nama Program Studi</label>
        <p>{{ $prodi->nama }}</p>
    </div>

    <div class="form-group">
        <label>Dibuat Pada</label>
        <p>{{ $prodi->created_at->format('d-m-Y H:i') }}</p>
    </div>

    <a href="{{ route('prodi.edit', $prodi->id) }}"
       class="btn primary">Edit Data</a>

    <a href="{{ route('prodi.index') }}"
       class="btn secondary">Kembali</a>

</div>

@endsection
