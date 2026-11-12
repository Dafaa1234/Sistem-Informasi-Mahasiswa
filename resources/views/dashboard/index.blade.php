
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard SIM</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            color: #263449;
        }

        .navbar {
            background: #1e3a5f;
            color: white;
            padding: 20px 6%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h2 {
            margin: 0;
            font-size: 20px;
        }

        .navbar nav {
            display: flex;
            gap: 24px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            font-size: 14px;
        }

        .container {
            max-width: 1200px;
            margin: 38px auto;
            padding: 0 24px;
        }

        .heading {
            margin-bottom: 28px;
        }

        .heading h1 {
            margin: 0 0 8px;
            font-size: 27px;
        }

        .heading p {
            color: #758195;
            margin: 0;
            font-size: 14px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 25px;
        }

        .stat-card, .panel {
            background: white;
            border: 1px solid #e3e8ef;
            border-radius: 9px;
            padding: 24px;
        }

        .stat-title {
            color: #718096;
            font-size: 14px;
        }

        .stat-number {
            font-size: 32px;
            font-weight: bold;
            margin-top: 14px;
            color: #1e3a5f;
        }

        .panel h3 {
            margin: 0 0 8px;
            font-size: 18px;
        }

        .panel-description {
            color: #788497;
            font-size: 13px;
            margin-bottom: 25px;
        }

        .prodi-item {
            margin-bottom: 24px;
        }

        .prodi-info {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            margin-bottom: 9px;
        }

        .bar-background {
            width: 100%;
            height: 10px;
            border-radius: 10px;
            background: #e8edf3;
            overflow: hidden;
        }

        .bar-fill {
            height: 100%;
            background: #315f91;
            border-radius: 10px;
        }

        .empty-state {
            padding: 25px;
            text-align: center;
            background: #f8fafc;
            color: #788497;
            border-radius: 7px;
            font-size: 14px;
        }

        footer {
            text-align: center;
            color: #8792a3;
            font-size: 13px;
            padding: 25px;
        }

        @media (max-width: 650px) {
            .navbar {
                flex-direction: column;
                gap: 16px;
            }

            .navbar nav {
                flex-wrap: wrap;
                justify-content: center;
            }

            .stats {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <header class="navbar">
        <h2>SIM | Sistem Informasi Mahasiswa</h2>

        <nav>
            <a href="{{ route('sim.dashboard') }}">Dashboard</a>
            <a href="{{ url('/mahasiswa') }}">Data Mahasiswa</a>
            <a href="{{ url('/prodi') }}">Program Studi</a>
        </nav>
    </header>

    <main class="container">

        <div class="heading">
            <h1>Dashboard</h1>
            <p>Ringkasan informasi dan statistik data mahasiswa.</p>
        </div>

        <!-- Statistik Utama -->
        <section class="stats">

            <div class="stat-card">
                <div class="stat-title">
                    Total Mahasiswa
                </div>

                <div class="stat-number">
                    {{ number_format($totalMahasiswa) }}
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-title">
                    Total Program Studi
                </div>

                <div class="stat-number">
                    {{ number_format($totalProdi) }}
                </div>
            </div>

        </section>

        <!-- Sebaran Mahasiswa -->
        <section class="panel">

            <h3>Sebaran Mahasiswa per Program Studi</h3>

            <div class="panel-description">
                Statistik jumlah mahasiswa berdasarkan program studi.
            </div>

            @forelse($mahasiswaPerProdi as $item)

                @php
                    $persentase = $totalMahasiswa > 0
                        ? round(($item->total / $totalMahasiswa) * 100)
                        : 0;
                @endphp

                <div class="prodi-item">

                    <div class="prodi-info">
                        <span>{{ $item->prodi }}</span>

                        <strong>
                            {{ $item->total }} Mahasiswa
                            ({{ $persentase }}%)
                        </strong>
                    </div>

                    <div class="bar-background">
                        <div class="bar-fill"
                             style="width: {{ $persentase }}%;">
                        </div>
                    </div>

                </div>

            @empty

                <div class="empty-state">
                    Belum ada data mahasiswa berdasarkan program studi.
                </div>

            @endforelse

        </section>

    </main>

    <footer>
        Sistem Informasi Mahasiswa &copy; {{ date('Y') }}
    </footer>

</body>
</html>
