<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Publikasi Karya Mahasiswa LP3I Purwakarta</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<!-- =========================
     NAVBAR
========================= -->

<nav class="navbar">

    <div class="container navbar-inner">

        <a href="#beranda" class="logo">
            LP3I<span>.</span>
        </a>

        <div class="nav-menu">

            <a href="#beranda">
                Beranda
            </a>

            <a href="#karya">
                Karya
            </a>

            <a href="#kategori">
                Kategori
            </a>

            <a href="{{ route('login') }}" class="nav-login">
                Login Mahasiswa
            </a>

        </div>

    </div>

</nav>


<!-- =========================
     HERO / BERANDA
========================= -->

<section class="hero" id="beranda">

    <div class="container">

        <div class="hero-box">

            <div class="hero-content">

                <span class="hero-label">
                    LP3I PURWAKARTA • DIGITAL GALLERY
                </span>

                <h1>
                    Wadah Karya,<br>
                    Langkah Menuju<br>
                    Masa Depan.
                </h1>

                <p>
                    Ruang digital untuk menampilkan karya,
                    kreativitas, dan hasil perjalanan mahasiswa
                    LP3I Purwakarta.
                </p>

                <a href="#karya" class="hero-button">
                    Jelajahi Karya
                </a>

            </div>

        </div>

    </div>

</section>


<!-- =========================
     KARYA TERBARU
========================= -->

<section class="section" id="karya">

    <div class="container">

        <div class="section-header">

            <div>
                <h2 class="section-title">
                    Karya Terbaru
                </h2>

                <p class="section-description">
                    Jelajahi karya terbaru mahasiswa LP3I Purwakarta.
                </p>
            </div>

            <a
                href="{{ route('pengunjung.karya.index') }}"
                class="section-link"
            >
                Lihat Semua Karya →
            </a>

        </div>


        @if ($karya->count() > 0)

            <div class="artwork-grid">

                @foreach ($karya as $item)

                    <article class="artwork-card">

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
                                            align-items:center;
                                            justify-content:center;
                                            font-family:Georgia,serif;
                                            color:#766b6b;
                                        "
                                    >
                                        File Karya
                                    </div>

                                @endif

                            @else

                                <div
                                    style="
                                        height:100%;
                                        display:flex;
                                        align-items:center;
                                        justify-content:center;
                                        font-family:Georgia,serif;
                                        color:#766b6b;
                                    "
                                >
                                    Belum Ada Preview
                                </div>

                            @endif

                        </div>


                        <div class="artwork-content">

                            <div class="artwork-category">
                                {{ $item->kategori->nama_kategori }}
                            </div>

                            <h3 class="artwork-title">
                                {{ $item->judul }}
                            </h3>

                            <p class="artwork-author">
                                {{ $item->mahasiswa->nama }}
                            </p>


                            <div class="artwork-bottom">

                                <span class="status-badge">
                                    Disetujui
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
                Belum ada karya yang dipublikasikan.
            </div>

        @endif

    </div>

</section>

<!-- =========================
     KATEGORI
========================= -->

<section class="section" id="kategori">

    <div class="container">

        <div class="section-header">

            <div>
                <h2 class="section-title">
                    Kategori Karya
                </h2>

                <p class="section-description">
                    Jelajahi karya berdasarkan bidangnya.
                </p>
            </div>

        </div>


        @if ($kategori->count() > 0)

            <div class="category-grid">

                @foreach ($kategori as $index => $item)

                    <a
                        href="{{ route('pengunjung.karya.kategori', $item->id_kategori) }}"
                        class="category-card"
                    >

                        <div class="category-number">
                            {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                        </div>

                        <h3>
                            {{ $item->nama_kategori }}
                        </h3>

                        <p>
                            Jelajahi karya →
                        </p>

                    </a>

                @endforeach

            </div>

        @else

            <div class="empty-state">
                Belum ada kategori karya.
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

            <a href="#beranda">
                Beranda
            </a>

            <a href="#karya">
                Karya
            </a>

            <a href="#kategori">
                Kategori
            </a>

        </div>

    </div>

</footer>


</body>
</html>