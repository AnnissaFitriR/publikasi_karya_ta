<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karya Saya</title>
</head>
<body>

    <h1>Karya Saya</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="{{ route('mahasiswa.karya.create') }}">+ Tambah Karya</a>

    <br><br>

    @if ($karya->count() > 0)

        @foreach ($karya as $item)

        <div>

        @if ($item->file_karya)

    @php
        $extension = strtolower(pathinfo($item->file_karya, PATHINFO_EXTENSION));
    @endphp

    @if (in_array($extension, ['jpg', 'jpeg', 'png']))

        <img
            src="{{ asset('storage/' . $item->file_karya) }}"
            alt="{{ $item->judul }}"
            width="200"
        >

    @else

        <p>
            File Karya:
            <a
                href="{{ asset('storage/' . $item->file_karya) }}"
                target="_blank"
            >
                Lihat / Download File
            </a>
        </p>

    @endif

@endif

        <h3>{{ $item->judul }}</h3>

        <p>Kategori: {{ $item->kategori->nama_kategori }}</p>

        <p>Status: {{ $item->status }}</p>

        @if ($item->status === 'ditolak' && $item->catatan)
            <p>
                <strong>Catatan Admin:</strong>
                {{ $item->catatan }}
            </p>
        @endif

        <p>{{ $item->deskripsi }}</p>

        <a href="{{ route('mahasiswa.karya.edit', $item->id_karya) }}">
            Edit
        </a>

        <form action="{{ route('mahasiswa.karya.destroy', $item->id_karya) }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit">Hapus</button>
        </form>
    </div>

    <hr>

    @endforeach

    @else

        <p>Belum ada karya yang dipublikasikan.</p>

    @endif

</body>
</html>