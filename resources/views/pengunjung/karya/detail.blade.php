<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $karya->judul }} - LP3I Purwakarta</title>

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
     DETAIL KARYA
========================= -->

<section class="section">

    <div class="container">

        <!-- Tombol kembali -->

        <a
            href="{{ route('pengunjung.karya.index') }}"
            class="section-link"
        >
            ← Kembali ke Semua Karya
        </a>


        <div
            style="
                display:grid;
                grid-template-columns: 1.15fr 0.85fr;
                gap:50px;
                align-items:start;
                margin-top:30px;
            "
        >

            <!-- =========================
                 PREVIEW KARYA
            ========================= -->

            <div>

                <div
                    style="
                        background:#fffaf4;
                        border:1px solid #e7dbce;
                        border-radius:24px;
                        padding:18px;
                        overflow:hidden;
                    "
                >

                    @if ($karya->file_karya)

                        @php
                            $extension = strtolower(
                                pathinfo(
                                    $karya->file_karya,
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
                                src="{{ asset('storage/' . $karya->file_karya) }}"
                                alt="{{ $karya->judul }}"
                                style="
                                    width:100%;
                                    max-height:650px;
                                    object-fit:contain;
                                    border-radius:16px;
                                "
                            >

                        @else

                            <div
                                style="
                                    min-height:450px;
                                    display:flex;
                                    flex-direction:column;
                                    align-items:center;
                                    justify-content:center;
                                    text-align:center;
                                    background:#f1e8de;
                                    border-radius:16px;
                                "
                            >

                                <div
                                    style="
                                        font-family:Georgia,serif;
                                        font-size:28px;
                                        color:#3d3438;
                                    "
                                >
                                    File Karya
                                </div>

                                <p
                                    style="
                                        margin-top:8px;
                                        color:#766b6b;
                                        font-size:14px;
                                    "
                                >
                                    Format {{ strtoupper($extension) }}
                                </p>

                                <a
                                    href="{{ asset('storage/' . $karya->file_karya) }}"
                                    target="_blank"
                                    class="hero-button"
                                    style="margin-top:20px;"
                                >
                                    Buka File
                                </a>

                            </div>

                        @endif

                    @else

                        <div
                            class="empty-state"
                            style="min-height:450px;"
                        >
                            Belum ada preview karya.
                        </div>

                    @endif

                </div>

            </div>


            <!-- =========================
                 INFORMASI KARYA
            ========================= -->

            <div>

                <span class="artwork-category">
                    {{ $karya->kategori->nama_kategori }}
                </span>


                <h1
                    style="
                        font-family:Georgia,serif;
                        font-size:48px;
                        line-height:1.1;
                        color:#3d3438;
                        margin:12px 0 18px;
                    "
                >
                    {{ $karya->judul }}
                </h1>


                <div
                    style="
                        display:inline-flex;
                        align-items:center;
                        gap:8px;
                        padding:7px 12px;
                        border-radius:30px;
                        background:#e4eee0;
                        color:#55704d;
                        font-size:12px;
                        font-weight:bold;
                        margin-bottom:25px;
                    "
                >
                    Karya Dipublikasikan
                </div>


                <!-- Penulis -->

                <div
                    style="
                        padding:18px 0;
                        border-top:1px solid #e2d7cc;
                        border-bottom:1px solid #e2d7cc;
                    "
                >

                    <span
                        style="
                            display:block;
                            font-size:11px;
                            text-transform:uppercase;
                            letter-spacing:1px;
                            color:#9c8b83;
                            margin-bottom:4px;
                        "
                    >
                        Karya oleh
                    </span>

                    <strong
                        style="
                            font-family:Georgia,serif;
                            font-size:20px;
                            color:#3d3438;
                        "
                    >
                        {{ $karya->mahasiswa->nama }}
                    </strong>

                </div>


                <!-- Deskripsi -->

                <div style="margin-top:28px;">

                    <h2
                        style="
                            font-family:Georgia,serif;
                            font-size:24px;
                            color:#3d3438;
                            margin-bottom:10px;
                        "
                    >
                        Tentang Karya
                    </h2>

                    <p
                        style="
                            color:#766b6b;
                            font-size:15px;
                            line-height:1.8;
                        "
                    >
                        {{ $karya->deskripsi }}
                    </p>

                </div>


                <!-- File -->

                @if ($karya->file_karya)

                    <a
                        href="{{ asset('storage/' . $karya->file_karya) }}"
                        target="_blank"
                        class="hero-button"
                        style="
                            margin-top:30px;
                            display:inline-block;
                        "
                    >
                        Buka / Download Karya
                    </a>

                @endif

            </div>

        </div>

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