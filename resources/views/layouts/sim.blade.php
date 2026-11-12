
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - SIM</title>

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

        header {
            background: #1e3a5f;
            color: white;
            padding: 18px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h2 {
            margin: 0;
            font-size: 21px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 22px;
            font-size: 14px;
        }

        main {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            border-radius: 9px;
            padding: 25px;
            border: 1px solid #e2e7ed;
        }

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 22px;
        }

        h1 {
            font-size: 25px;
            margin: 0 0 7px;
        }

        .muted {
            color: #718096;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            text-align: left;
            padding: 14px;
            border-bottom: 1px solid #e5e9ef;
        }

        th {
            background: #f0f3f7;
            font-size: 13px;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #d5dce5;
            border-radius: 6px;
            margin-top: 7px;
        }

        label {
            font-weight: 600;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            border: 0;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            font-size: 13px;
        }

        .primary {
            background: #24558a;
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
            background: #e4f5e9;
            color: #206b38;
            padding: 13px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .error-message {
            color: #c53030;
            font-size: 13px;
            margin-top: 5px;
        }

        footer {
            text-align: center;
            color: #718096;
            padding: 25px;
            font-size: 13px;
        }

        .actions {
            display: flex;
            gap: 7px;
        }
    </style>
</head>
<body>

    <header>
        <h2>SIM | Sistem Informasi Mahasiswa</h2>

        <nav>
            <a href="{{ url('/') }}">Beranda</a>
            <a href="{{ route('prodi.index') }}">Program Studi</a>
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
