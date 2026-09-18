<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Kategori</title>
</head>
<body>

<h1>Kelola Kategori</h1>

<a href="{{ route('admin.dashboard') }}">
    ← Kembali ke Dashboard
</a>

<br><br>

@if (session('success'))
    <p>{{ session('success') }}</p>
@endif

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<h2>Tambah Kategori</h2>

<form action="{{ route('admin.kategori.store') }}" method="POST">
    @csrf

    <label for="nama_kategori">Nama Kategori</label>
    <input
        type="text"
        id="nama_kategori"
        name="nama_kategori"
        required
    >

    <button type="submit">
        Tambah
    </button>
</form>

<hr>

<h2>Daftar Kategori</h2>

@if ($kategori->count() > 0)

    @foreach ($kategori as $item)

        <div>
            <strong>{{ $item->nama_kategori }}</strong>

            <a href="{{ route('admin.kategori.edit', $item->id_kategori) }}">
                Edit
            </a>

            <form
                action="{{ route('admin.kategori.destroy', $item->id_kategori) }}"
                method="POST"
                style="display:inline;"
            >
                @csrf
                @method('DELETE')

                <button type="submit">
                    Hapus
                </button>
            </form>
        </div>

        <br>

    @endforeach

@else

    <p>Belum ada kategori.</p>

@endif

</body>
</html>