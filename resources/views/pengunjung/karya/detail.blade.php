<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $karya->judul }}</title>
</head>
<body>

<h1>{{ $karya->judul }}</h1>

<p>
    <strong>Mahasiswa:</strong>
    {{ $karya->mahasiswa->nama }}
</p>

<p>
    <strong>Kategori:</strong>
    {{ $karya->kategori->nama_kategori }}
</p>

<p>
    <strong>Deskripsi:</strong>
</p>

<p>
    {{ $karya->deskripsi }}
</p>

@if ($karya->file_karya)

    @php
        $extension = strtolower(
            pathinfo($karya->file_karya, PATHINFO_EXTENSION)
        );
    @endphp

    @if (in_array($extension, ['jpg', 'jpeg', 'png']))

        <img
            src="{{ asset('storage/' . $karya->file_karya) }}"
            alt="{{ $karya->judul }}"
            width="400"
        >

    @else

        <p>
            <a
                href="{{ asset('storage/' . $karya->file_karya) }}"
                target="_blank"
            >
                Lihat / Download File
            </a>
        </p>

    @endif

@endif

<br><br>

<a href="{{ route('pengunjung.karya.index') }}">
    ← Kembali ke Semua Karya
</a>

</body>
</html>