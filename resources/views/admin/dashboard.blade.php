<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
</head>
<body>

<h1>Dashboard Admin</h1>

<p>Selamat datang, Admin LP3I!</p>

<hr>

<h2>Menu Admin</h2>

<ul>
    <li>
        <a href="{{ route('admin.karya.index') }}">
            Kelola Karya
        </a>
    </li>

    <li>
        <a href="{{ route('admin.kategori.index') }}">
            Kelola Kategori
        </a>
    </li>
</ul>

<hr>

<form action="{{ route('admin.logout') }}" method="POST">
    @csrf

    <button type="submit">
        Logout
    </button>
</form>

</body>
</html>