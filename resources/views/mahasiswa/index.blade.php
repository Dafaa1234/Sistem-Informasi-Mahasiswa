
@extends('layouts.sim')

@section('title', 'Data Mahasiswa')

@section('content')

<div class="page-heading">
    <div>
        <h1>Data Mahasiswa</h1>
        <p class="muted">Kelola informasi dan data mahasiswa.</p>
    </div>

    <a href="{{ route('mahasiswa.create') }}" class="btn primary">
        + Tambah Mahasiswa
    </a>
</div>

<div class="card">

    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <div style="overflow-x:auto;">
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Program Studi</th>
                    <th>Angkatan</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($mahasiswas as $index => $mahasiswa)
                    <tr>
                        <td>{{ $mahasiswas->firstItem() + $index }}</td>
                        <td>{{ $mahasiswa->nim }}</td>
                        <td>{{ $mahasiswa->nama }}</td>
                        <td>{{ $mahasiswa->prodi ?? '-' }}</td>
                        <td>{{ $mahasiswa->angkatan ?? '-' }}</td>
                        <td>{{ $mahasiswa->email ?? '-' }}</td>

                        <td>
                            <div class="actions">

                                <a href="{{ route('mahasiswa.show', $mahasiswa->id) }}"
                                   class="btn secondary">
                                    Detail
                                </a>

                                <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}"
                                   class="btn primary">
                                    Edit
                                </a>

                                <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}"
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
                        <td colspan="7" style="text-align:center; padding:35px;">
                            <strong>Belum Ada Data Mahasiswa</strong>
                            <p class="muted">
                                Silakan tambahkan data mahasiswa terlebih dahulu.
                            </p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="margin-top:20px;">
        {{ $mahasiswas->links() }}
    </div>

</div>

@endsection
