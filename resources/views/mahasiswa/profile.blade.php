<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Mahasiswa</title>
</head>
<body>

    <h1>Profil Mahasiswa</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    @if ($mahasiswa->foto)
        <img
            src="{{ asset('storage/' . $mahasiswa->foto) }}"
            alt="Foto Profil"
            width="150"
        >
    @endif

    <form action="{{ route('mahasiswa.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label>NIPD</label>
            <input type="text" value="{{ $mahasiswa->nipd }}" disabled>
        </div>

        <br>

        <div>
            <label for="nama">Nama</label>
            <input
                type="text"
                id="nama"
                name="nama"
                value="{{ $mahasiswa->nama }}"
                required
            >
        </div>

        <br>

        <div>
            <label for="program_studi">Program Studi</label>
            <input
                type="text"
                id="program_studi"
                name="program_studi"
                value="{{ $mahasiswa->program_studi }}"
                required
            >
        </div>

        <br>

        <div>
            <label for="email">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ $mahasiswa->email }}"
                required
            >
        </div>

        <br>

        <div>
            <label for="foto">Foto Profil</label>
            <input
                type="file"
                id="foto"
                name="foto"
                accept="image/*"
            >
        </div>

        <br>

        <button type="submit">Simpan Perubahan</button>
    </form>

</body>
</html>