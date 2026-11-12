
@extends('layouts.sim')

@section('title', 'Data Program Studi')

@section('content')

<div class="page-heading">
    <div>
        <h1>Data Program Studi</h1>
        <p class="muted">Kelola data program studi yang tersedia.</p>
    </div>

    <a href="{{ route('prodi.create') }}" class="btn primary">
        + Tambah Program Studi
    </a>
</div>

<div class="card">

    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Prodi</th>
                <th>Nama Program Studi</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($prodis as $index => $prodi)
                <tr>
                    <td>{{ $prodis->firstItem() + $index }}</td>
                    <td>{{ $prodi->kode }}</td>
                    <td>{{ $prodi->nama }}</td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('prodi.show', $prodi->id) }}"
                               class="btn secondary">Detail</a>

                            <a href="{{ route('prodi.edit', $prodi->id) }}"
                               class="btn primary">Edit</a>

                            <form action="{{ route('prodi.destroy', $prodi->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn danger">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align:center;padding:30px;">
                        Belum ada data program studi.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top:20px;">
        {{ $prodis->links() }}
    </div>

</div>

@endsection
