
@extends('layouts.sim')

@section('title', 'Dashboard')

@section('content')

<style>
    .dashboard-heading {
        margin-bottom: 25px;
    }

    .dashboard-heading h1 {
        font-size: 25px;
        margin: 0 0 8px;
    }

    .dashboard-stats {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        margin-bottom: 25px;
    }

    .dashboard-stat {
        background: #ffffff;
        border: 1px solid #e1e7ef;
        border-radius: 9px;
        padding: 25px;
    }

    .stat-label {
        color: #718096;
        font-size: 14px;
    }

    .stat-number {
        color: #1e3a5f;
        font-size: 32px;
        font-weight: bold;
        margin-top: 12px;
    }

    .dashboard-panel {
        background: #ffffff;
        border: 1px solid #e1e7ef;
        border-radius: 9px;
        padding: 25px;
    }

    .dashboard-panel h3 {
        font-size: 18px;
        margin: 0 0 8px;
    }

    .distribution-item {
        margin-top: 25px;
    }

    .distribution-info {
        display: flex;
        justify-content: space-between;
        gap: 15px;
        font-size: 14px;
        margin-bottom: 10px;
    }

    .progress-track {
        width: 100%;
        height: 10px;
        background: #e8edf3;
        border-radius: 10px;
        overflow: hidden;
    }

    .progress-value {
        height: 100%;
        background: #315f91;
        border-radius: 10px;
    }

    .empty-state {
        padding: 30px;
        background: #f7f9fc;
        text-align: center;
        border-radius: 7px;
        color: #718096;
        margin-top: 20px;
    }

    @media(max-width: 650px) {
        .dashboard-stats {
            grid-template-columns: 1fr;
        }

        .distribution-info {
            flex-direction: column;
        }
    }
</style>

<div class="dashboard-heading">
    <h1>Dashboard</h1>

    <p class="muted">
        Ringkasan informasi dan statistik Sistem Informasi Mahasiswa.
    </p>
</div>

<div class="dashboard-stats">

    <div class="dashboard-stat">
        <div class="stat-label">Total Mahasiswa</div>

        <div class="stat-number">
            {{ number_format($totalMahasiswa) }}
        </div>
    </div>

    <div class="dashboard-stat">
        <div class="stat-label">Total Program Studi</div>

        <div class="stat-number">
            {{ number_format($totalProdi) }}
        </div>
    </div>

</div>

<div class="dashboard-panel">

    <h3>Sebaran Mahasiswa per Program Studi</h3>

    <p class="muted">
        Statistik jumlah mahasiswa berdasarkan program studi.
    </p>

    @forelse($mahasiswaPerProdi as $item)

        @php
            $persentase = $totalMahasiswa > 0
                ? round(($item->total / $totalMahasiswa) * 100)
                : 0;
        @endphp

        <div class="distribution-item">

            <div class="distribution-info">
                <strong>{{ $item->prodi }}</strong>

                <span>
                    {{ $item->total }} Mahasiswa
                    ({{ $persentase }}%)
                </span>
            </div>

            <div class="progress-track">
                <div class="progress-value"
                     style="width: {{ $persentase }}%;">
                </div>
            </div>

        </div>

    @empty

        <div class="empty-state">
            <strong>Belum Ada Data Mahasiswa</strong>

            <p>
                Tambahkan data mahasiswa untuk melihat statistik program studi.
            </p>

            <a href="{{ route('mahasiswa.create') }}"
               class="btn primary">
                Tambah Mahasiswa
            </a>
        </div>

    @endforelse

</div>

@endsection
