<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Karya</title>
</head>
<body>

<h1>Kelola Karya</h1>

<a href="{{ route('admin.dashboard') }}">← Kembali ke Dashboard</a>

<br><br>

@if ($karya->count() > 0)

    @foreach ($karya as $item)

        <div>
            <h3>{{ $item->judul }}</h3>

            <p>
                Mahasiswa:
                {{ $item->mahasiswa->nama }}
            </p>

            <p>
                Kategori:
                {{ $item->kategori->nama_kategori }}
            </p>

            <p>
                Status:
                {{ $item->status }}
            </p>

            <p>
                Deskripsi:
                {{ $item->deskripsi }}
            </p>

            <a href="{{ route('admin.karya.detail', $item->id_karya) }}">
                Lihat Detail
            </a>
        </div>

        <hr>

    @endforeach

@else

    <p>Belum ada karya mahasiswa.</p>

@endif

</body>
</html>