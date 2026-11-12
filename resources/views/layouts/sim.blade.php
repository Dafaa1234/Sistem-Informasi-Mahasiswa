
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SIM') - Sistem Informasi Mahasiswa</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            color: #253247;
        }

        .navbar {
            background: #ffffff;
            border-bottom: 1px solid #e1e6ed;
            padding: 0 6%;
            min-height: 72px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .brand {
            font-size: 19px;
            font-weight: bold;
            color: #1e3a5f;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-links a {
            text-decoration: none;
            color: #526176;
            padding: 12px 15px;
            border-radius: 5px;
            font-size: 14px;
        }

        .nav-links a:hover,
        .nav-links a.active {
            background: #edf2f8;
            color: #1e3a5f;
        }

        main {
            max-width: 1200px;
            margin: 35px auto;
            padding: 0 22px;
            min-height: 70vh;
        }

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .page-heading h1 {
            font-size: 25px;
            margin: 0 0 8px;
        }

        .muted {
            color: #718096;
            font-size: 14px;
        }

        .card {
            background: #ffffff;
            border: 1px solid #e1e7ef;
            border-radius: 9px;
            padding: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 14px;
            text-align: left;
            border-bottom: 1px solid #e5e9ef;
        }

        th {
            background: #f1f4f8;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #d5dce5;
            border-radius: 5px;
            margin-top: 8px;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            font-size: 13px;
        }

        .primary {
            background: #1e3a5f;
            color: white;
        }

        .secondary {
            background: #e8edf3;
            color: #253247;
        }

        .danger {
            background: #c83e4d;
            color: white;
        }

        .success-message {
            padding: 13px;
            background: #e4f5e9;
            color: #206b38;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .error-message {
            color: #c53030;
            font-size: 13px;
            margin-top: 5px;
        }

        .actions {
            display: flex;
            gap: 7px;
        }

        footer {
            text-align: center;
            padding: 22px;
            color: #718096;
            font-size: 13px;
            border-top: 1px solid #e1e6ed;
        }

        @media(max-width: 700px) {
            .navbar {
                padding: 15px;
                flex-direction: column;
                gap: 12px;
            }

            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }

            .page-heading {
                align-items: flex-start;
                gap: 15px;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    <header class="navbar">

        <a href="{{ route('dashboard') }}" class="brand">
            SIM
            <span style="font-weight: normal;">
                | Sistem Informasi Mahasiswa
            </span>
        </a>

        <nav class="nav-links">

            <a href="{{ route('dashboard') }}"
               class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                Dashboard
            </a>

            <a href="{{ route('mahasiswa.index') }}"
               class="{{ request()->routeIs('mahasiswa.*') ? 'active' : '' }}">
                Data Mahasiswa
            </a>

            @if (\Illuminate\Support\Facades\Route::has('prodi.index'))
                <a href="{{ route('prodi.index') }}"
                class="{{ request()->routeIs('prodi.*') ? 'active' : '' }}">
                    Program Studi
                </a>
            @endif

        </nav>

    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        Sistem Informasi Mahasiswa &copy; {{ date('Y') }}
    </footer>

</body>
</html>
