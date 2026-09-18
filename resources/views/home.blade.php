<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Publikasi Karya Mahasiswa LP3I Purwakarta</title>
</head>
<body>

<h1>Publikasi Karya Mahasiswa LP3I Purwakarta</h1>

<p>
    Selamat datang di website publikasi karya mahasiswa LP3I Purwakarta.
</p>

<hr>

<h2>Kategori</h2>

@foreach ($kategori as $item)

    <a href="{{ route('pengunjung.karya.kategori', $item->id_kategori) }}">
        {{ $item->nama_kategori }}
    </a>

@endforeach

<hr>

<h2>Karya Terbaru</h2>

<a href="{{ route('pengunjung.karya.index') }}">
    Lihat Semua Karya
</a>

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

            <p>{{ $item->deskripsi }}</p>

            <hr>
        </div>

    @endforeach

@else

    <p>Belum ada karya yang dipublikasikan.</p>

@endif

<br>

<a href="{{ route('login') }}">
    Login Mahasiswa
</a>

</body>
</html>