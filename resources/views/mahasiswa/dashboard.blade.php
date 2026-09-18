<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa</title>
</head>
<body>

    <h1>Dashboard Mahasiswa</h1>

    <p>
        Selamat datang, {{ Auth::user()->nama }}!
    </p>

    <p>
        Kamu berhasil login sebagai mahasiswa.
    </p>

    <hr>

    <h2>Navigasi</h2>

    <ul>
        <li>
            <a href="{{ route('mahasiswa.dashboard') }}">
                Dashboard
            </a>
        </li>

        <li>
            <a href="{{ route('mahasiswa.karya.index') }}">
                Karya Saya
            </a>
        </li>

        <li>
            <a href="{{ route('mahasiswa.profile') }}">
                Profile
            </a>
        </li>
    </ul>

    <hr>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>

</body>
</html>