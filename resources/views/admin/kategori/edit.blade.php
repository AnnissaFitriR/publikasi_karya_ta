<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Kategori</title>
</head>
<body>

<h1>Edit Kategori</h1>

<a href="{{ route('admin.kategori.index') }}">
    ← Kembali ke Kelola Kategori
</a>

<br><br>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form
    action="{{ route('admin.kategori.update', $kategori->id_kategori) }}"
    method="POST"
>
    @csrf
    @method('PUT')

    <label for="nama_kategori">Nama Kategori</label>

    <input
        type="text"
        id="nama_kategori"
        name="nama_kategori"
        value="{{ $kategori->nama_kategori }}"
        required
    >

    <button type="submit">
        Simpan Perubahan
    </button>
</form>

</body>
</html>