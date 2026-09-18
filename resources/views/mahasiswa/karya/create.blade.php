<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Karya</title>
</head>
<body>

    <h1>Tambah Karya</h1>

    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('mahasiswa.karya.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="judul">Judul Karya</label>
            <input
                type="text"
                id="judul"
                name="judul"
                value="{{ old('judul') }}"
                required
            >
        </div>

        <br>

        <div>
            <label for="id_kategori">Kategori</label>
            <select id="id_kategori" name="id_kategori" required>
                <option value="">-- Pilih Kategori --</option>

                @foreach ($kategori as $item)
                    <option value="{{ $item->id_kategori }}">
                        {{ $item->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <br>

        <div>
            <label for="deskripsi">Deskripsi</label>
            <textarea
                id="deskripsi"
                name="deskripsi"
                rows="5"
                required
            >{{ old('deskripsi') }}</textarea>
        </div>

        <br>

        <div>
            <label for="file_karya">File Karya</label>
            <input
                type="file"
                id="file_karya"
                name="file_karya"
                accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.zip"
                required
            >
        </div>

        <br>

        <button type="submit">Simpan Karya</button>
        <a href="{{ route('mahasiswa.karya.index') }}">Batal</a>

    </form>

</body>
</html>