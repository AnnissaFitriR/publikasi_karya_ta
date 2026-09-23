<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Kategori {{ $kategori->nama_kategori }} - LP3I Purwakarta
    </title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<!-- =========================
     NAVBAR
========================= -->

<nav class="navbar">

    <div class="container navbar-inner">

        <a href="{{ route('home') }}" class="logo">
            LP3I<span>.</span>
        </a>

        <div class="nav-menu">

            <a href="{{ route('home') }}">
                Beranda
            </a>

            <a href="{{ route('home') }}#karya">
                Karya
            </a>

            <a href="{{ route('home') }}#kategori">
                Kategori
            </a>

            <a href="{{ route('login') }}" class="nav-login">
                Login Mahasiswa
            </a>

        </div>

    </div>

</nav>


<!-- =========================
     HEADER KATEGORI
========================= -->

<section class="hero" style="padding-bottom: 30px;">

    <div class="container">

        <div
            class="hero-box"
            style="min-height: 300px;"
        >

            <div class="hero-content">

                <span class="hero-label">
                    KATEGORI KARYA
                </span>

                <h1>
                    {{ $kategori->nama_kategori }}
                </h1>

                <p>
                    Jelajahi karya mahasiswa yang termasuk
                    dalam kategori {{ strtolower($kategori->nama_kategori) }}.
                </p>

            </div>

        </div>

    </div>

</section>


<!-- =========================
     DAFTAR KARYA
========================= -->

<section class="section">

    <div class="container">

        <div class="section-header">

            <div>

                <h2 class="section-title">
                    Karya {{ $kategori->nama_kategori }}
                </h2>

                <p class="section-description">
                    Kumpulan karya mahasiswa dalam kategori ini.
                </p>

            </div>

            <a
                href="{{ route('pengunjung.karya.index') }}"
                class="section-link"
            >
                ← Semua Karya
            </a>

        </div>


        @if ($karya->count() > 0)

            <div class="artwork-grid">

                @foreach ($karya as $item)

                    <article class="artwork-card">

                        <!-- =========================
                             PREVIEW
                        ========================= -->

                        <div class="artwork-image">

                            @if ($item->file_karya)

                                @php
                                    $extension = strtolower(
                                        pathinfo(
                                            $item->file_karya,
                                            PATHINFO_EXTENSION
                                        )
                                    );
                                @endphp


                                @if (
                                    in_array(
                                        $extension,
                                        ['jpg', 'jpeg', 'png', 'webp']
                                    )
                                )

                                    <img
                                        src="{{ asset('storage/' . $item->file_karya) }}"
                                        alt="{{ $item->judul }}"
                                    >

                                @else

                                    <div
                                        style="
                                            height:100%;
                                            display:flex;
                                            flex-direction:column;
                                            align-items:center;
                                            justify-content:center;
                                            text-align:center;
                                            padding:20px;
                                        "
                                    >

                                        <strong>
                                            File Karya
                                        </strong>

                                        <span
                                            style="
                                                font-size:12px;
                                                margin-top:5px;
                                                color:#766b6b;
                                            "
                                        >
                                            {{ strtoupper($extension) }}
                                        </span>

                                    </div>

                                @endif

                            @else

                                <div
                                    style="
                                        height:100%;
                                        display:flex;
                                        align-items:center;
                                        justify-content:center;
                                        text-align:center;
                                        color:#766b6b;
                                    "
                                >
                                    Belum Ada Preview
                                </div>

                            @endif

                        </div>


                        <!-- =========================
                             INFORMASI
                        ========================= -->

                        <div class="artwork-content">

                            <div class="artwork-category">
                                {{ $item->kategori->nama_kategori }}
                            </div>


                            <h3 class="artwork-title">
                                {{ $item->judul }}
                            </h3>


                            <p class="artwork-author">
                                Karya oleh {{ $item->mahasiswa->nama }}
                            </p>


                            <div class="artwork-bottom">

                                <span class="status-badge">
                                    Dipublikasikan
                                </span>

                                <a
                                    href="{{ route('pengunjung.karya.detail', $item->id_karya) }}"
                                    class="detail-link"
                                >
                                    Lihat Detail →
                                </a>

                            </div>

                        </div>

                    </article>

                @endforeach

            </div>

        @else

            <div class="empty-state">

                <h3>
                    Belum Ada Karya
                </h3>

                <p>
                    Belum ada karya yang dipublikasikan
                    dalam kategori ini.
                </p>

            </div>

        @endif

    </div>

</section>


<!-- =========================
     FOOTER
========================= -->

<footer class="footer">

    <div class="container footer-inner">

        <div>

            <div class="footer-logo">
                LP3I
            </div>

            <p>
                Publikasi Karya Mahasiswa LP3I Purwakarta
            </p>

            <p>
                LP3I Digital Times — Menuju Kampus Digital 2026
            </p>

        </div>


        <div class="footer-links">

            <a href="{{ route('home') }}">
                Beranda
            </a>

            <a href="{{ route('home') }}#karya">
                Karya
            </a>

            <a href="{{ route('home') }}#kategori">
                Kategori
            </a>

        </div>

    </div>

</footer>


</body>
</html>