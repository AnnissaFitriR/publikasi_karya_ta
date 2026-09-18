<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Karya</title>
</head>
<body>

    <h1>Edit Karya</h1>

    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('mahasiswa.karya.update', $karya->id_karya) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="judul">Judul Karya</label>
            <input
                type="text"
                id="judul"
                name="judul"
                value="{{ old('judul', $karya->judul) }}"
                required
            >
        </div>

        <br>

        <div>
            <label for="id_kategori">Kategori</label>

            <select id="id_kategori" name="id_kategori" required>
                @foreach ($kategori as $item)
                    <option
                        value="{{ $item->id_kategori }}"
                        {{ $item->id_kategori == $karya->id_kategori ? 'selected' : '' }}
                    >
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
            >{{ old('deskripsi', $karya->deskripsi) }}</textarea>
        </div>

        <br>

        <button type="submit">Simpan Perubahan</button>

        <a href="{{ route('mahasiswa.karya.index') }}">
            Batal
        </a>

    </form>

</body>
</html>