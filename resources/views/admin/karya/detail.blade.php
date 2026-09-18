<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Karya</title>
</head>
<body>

<h1>Detail Karya</h1>

<a href="{{ route('admin.karya.index') }}">← Kembali ke Kelola Karya</a>

<br><br>

<h2>{{ $karya->judul }}</h2>

<p>
    <strong>Mahasiswa:</strong>
    {{ $karya->mahasiswa->nama }}
</p>

<p>
    <strong>NIPD:</strong>
    {{ $karya->mahasiswa->nipd }}
</p>

<p>
    <strong>Kategori:</strong>
    {{ $karya->kategori->nama_kategori }}
</p>

<p>
    <strong>Deskripsi:</strong>
    {{ $karya->deskripsi }}
</p>

<p>
    <strong>Status:</strong>
    {{ $karya->status }}
</p>

<hr>

<h3>File Karya</h3>

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
                Lihat / Download File Karya
            </a>
        </p>

    @endif

@endif

<hr>

@if (session('success'))
    <p>{{ session('success') }}</p>
@endif

@if ($karya->status === 'menunggu')

    <form action="{{ route('admin.karya.setujui', $karya->id_karya) }}" method="POST">
        @csrf

        <button type="submit">
            Setujui Karya
        </button>
    </form>

@endif

@if ($karya->status === 'menunggu')

    <form action="{{ route('admin.karya.tolak', $karya->id_karya) }}" method="POST">
        @csrf

        <div>
            <label for="catatan">Catatan / Alasan Penolakan</label>
            <br>

            <textarea
                id="catatan"
                name="catatan"
                rows="4"
                cols="50"
                required
            ></textarea>
        </div>

        <br>

        <button type="submit">
            Tolak Karya
        </button>
    </form>

@endif

</body>
</html>