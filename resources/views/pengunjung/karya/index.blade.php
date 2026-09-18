<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Semua Karya</title>
</head>
<body>

<h1>Semua Karya Mahasiswa</h1>

<a href="{{ route('home') }}">
    ← Kembali ke Beranda
</a>

<hr>

@if ($karya->count() > 0)

    @foreach ($karya as $item)

        <div>
            <h2>{{ $item->judul }}</h2>

            <p>
                Mahasiswa:
                {{ $item->mahasiswa->nama }}
            </p>

            <p>
                Kategori:
                {{ $item->kategori->nama_kategori }}
            </p>

            @if ($item->file_karya)

                @php
                    $extension = strtolower(
                        pathinfo($item->file_karya, PATHINFO_EXTENSION)
                    );
                @endphp

                @if (in_array($extension, ['jpg', 'jpeg', 'png']))

                    <img
                        src="{{ asset('storage/' . $item->file_karya) }}"
                        alt="{{ $item->judul }}"
                        width="200"
                    >

                @else

                    <p>
                        <a
                            href="{{ asset('storage/' . $item->file_karya) }}"
                            target="_blank"
                        >
                            Lihat / Download File
                        </a>
                    </p>

                @endif

            @endif

            <br><br>

            <a href="{{ route('pengunjung.karya.detail', $item->id_karya) }}">
                Lihat Detail
            </a>

        </div>

        <hr>

    @endforeach

@else

    <p>Belum ada karya yang dipublikasikan.</p>

@endif

</body>
</html>