<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Mahasiswa</title>
</head>
<body>

    <h1>Registrasi Mahasiswa</h1>

    <form action="{{ route('mahasiswa.register') }}" method="POST">
        @csrf

        <div>
            <label for="nipd">NIPD</label>
            <input type="text" id="nipd" name="nipd" value="{{ old('nipd') }}" required>
        </div>

        <br>

        <div>
            <label for="nama">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required>
        </div>

        <br>

        <div>
            <label for="program_studi">Program Studi</label>
            <input type="text" id="program_studi" name="program_studi" value="{{ old('program_studi') }}" required>
        </div>

        <br>

        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <br>

        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>

        <br>

        <div>
            <label for="password_confirmation">Konfirmasi Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>

        <br>

        <button type="submit">Daftar</button>
    </form>

</body>
</html>