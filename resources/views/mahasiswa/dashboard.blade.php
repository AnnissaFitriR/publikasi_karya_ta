<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Mahasiswa - LP3I Purwakarta</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<div
    style="
        min-height:100vh;
        display:flex;
        background:#f7f1e8;
    "
>

    <!-- =========================
         SIDEBAR
    ========================= -->

    <aside
        style="
            width:245px;
            min-height:100vh;
            background:#3d3438;
            color:#fff;
            padding:30px 20px;
            display:flex;
            flex-direction:column;
            position:fixed;
            left:0;
            top:0;
            bottom:0;
        "
    >

        <!-- LOGO -->

        <div
            style="
                font-family:Georgia,serif;
                font-size:25px;
                font-weight:bold;
                margin-bottom:45px;
                padding:0 10px;
            "
        >
            LP3I<span style="color:#d7a65b;">.</span>
        </div>


        <!-- MENU -->

        <nav>

            <a
                href="{{ route('mahasiswa.dashboard') }}"
                style="
                    display:block;
                    padding:13px 15px;
                    border-radius:12px;
                    background:#56494d;
                    color:#fff;
                    font-size:14px;
                    margin-bottom:8px;
                "
            >
                Dashboard
            </a>


            <a
                href="{{ route('mahasiswa.karya.index') }}"
                style="
                    display:block;
                    padding:13px 15px;
                    border-radius:12px;
                    color:#d8cbc2;
                    font-size:14px;
                    margin-bottom:8px;
                "
            >
                Karya Saya
            </a>


            <a
                href="{{ route('mahasiswa.profile') }}"
                style="
                    display:block;
                    padding:13px 15px;
                    border-radius:12px;
                    color:#d8cbc2;
                    font-size:14px;
                    margin-bottom:8px;
                "
            >
                Profile
            </a>

        </nav>


        <!-- BOTTOM -->

        <div style="margin-top:auto;">

            <div
                style="
                    border-top:1px solid #5b5053;
                    padding-top:20px;
                    margin-bottom:15px;
                    padding-left:10px;
                    padding-right:10px;
                "
            >

                <div
                    style="
                        font-size:11px;
                        color:#bdb0aa;
                        margin-bottom:4px;
                    "
                >
                    LOGIN SEBAGAI
                </div>

                <div
                    style="
                        font-size:14px;
                        font-weight:bold;
                    "
                >
                    {{ Auth::user()->nama }}
                </div>

            </div>


            <form
                action="{{ route('logout') }}"
                method="POST"
            >
                @csrf

                <button
                    type="submit"
                    style="
                        width:100%;
                        border:1px solid #66595c;
                        background:transparent;
                        color:#d8cbc2;
                        padding:11px;
                        border-radius:12px;
                        cursor:pointer;
                        font-size:13px;
                    "
                >
                    Logout
                </button>

            </form>

        </div>

    </aside>


    <!-- =========================
         MAIN CONTENT
    ========================= -->

    <main
        style="
            margin-left:245px;
            width:calc(100% - 245px);
            min-height:100vh;
            padding:45px 55px;
        "
    >

        <!-- TOP -->

        <div
            style="
                display:flex;
                justify-content:space-between;
                align-items:center;
                gap:20px;
                margin-bottom:35px;
            "
        >

            <div>

                <p
                    style="
                        font-size:12px;
                        color:#a65d4f;
                        font-weight:bold;
                        text-transform:uppercase;
                        letter-spacing:1px;
                        margin-bottom:5px;
                    "
                >
                    Dashboard Mahasiswa
                </p>

                <h1
                    style="
                        font-family:Georgia,serif;
                        font-size:38px;
                        color:#3d3438;
                    "
                >
                    Halo, {{ Auth::user()->nama }}.
                </h1>

            </div>


            <a
                href="{{ route('mahasiswa.karya.index') }}"
                class="hero-button"
            >
                Lihat Karya Saya →
            </a>

        </div>


        <!-- =========================
             WELCOME CARD
        ========================= -->

        <section
            style="
                background:
                    linear-gradient(
                        110deg,
                        #514247,
                        #765c59
                    );
                border-radius:25px;
                padding:40px;
                color:#fff;
                position:relative;
                overflow:hidden;
                margin-bottom:30px;
            "
        >

            <div
                style="
                    max-width:650px;
                    position:relative;
                    z-index:2;
                "
            >

                <span
                    style="
                        display:inline-block;
                        padding:7px 12px;
                        border-radius:30px;
                        background:rgba(255,255,255,0.12);
                        border:1px solid rgba(255,255,255,0.18);
                        font-size:11px;
                        margin-bottom:18px;
                    "
                >
                    RUANG KARYA MAHASISWA
                </span>


                <h2
                    style="
                        font-family:Georgia,serif;
                        font-size:32px;
                        line-height:1.2;
                        margin-bottom:12px;
                    "
                >
                    Jadikan idemu sebuah karya.
                </h2>


                <p
                    style="
                        color:#e8ddd5;
                        font-size:14px;
                        max-width:560px;
                        margin-bottom:25px;
                    "
                >
                    Publikasikan karya kamu dan biarkan
                    kreativitasmu menjadi bagian dari galeri
                    mahasiswa LP3I Purwakarta.
                </p>


                <a
                    href="{{ route('mahasiswa.karya.create') }}"
                    style="
                        display:inline-block;
                        padding:12px 20px;
                        background:#d7a65b;
                        color:#332d2d;
                        border-radius:30px;
                        font-size:13px;
                        font-weight:bold;
                    "
                >
                    + Tambah Karya
                </a>

            </div>


            <!-- DEKORASI -->

            <div
                style="
                    position:absolute;
                    width:220px;
                    height:220px;
                    border:1px solid rgba(255,255,255,0.12);
                    border-radius:50%;
                    right:-60px;
                    top:-60px;
                "
            ></div>

            <div
                style="
                    position:absolute;
                    width:150px;
                    height:150px;
                    border:1px solid rgba(255,255,255,0.10);
                    border-radius:50%;
                    right:40px;
                    bottom:-90px;
                "
            ></div>

        </section>


        <!-- =========================
             QUICK MENU
        ========================= -->

        <section>

            <div
                style="
                    display:flex;
                    justify-content:space-between;
                    align-items:end;
                    margin-bottom:18px;
                "
            >

                <div>

                    <h2
                        style="
                            font-family:Georgia,serif;
                            font-size:25px;
                            color:#3d3438;
                        "
                    >
                        Menu Kamu
                    </h2>

                    <p
                        style="
                            color:#766b6b;
                            font-size:13px;
                        "
                    >
                        Kelola aktivitas dan karya kamu.
                    </p>

                </div>

            </div>


            <div
                style="
                    display:grid;
                    grid-template-columns:repeat(2, 1fr);
                    gap:18px;
                "
            >

                <!-- KARYA -->

                <a
                    href="{{ route('mahasiswa.karya.index') }}"
                    style="
                        background:#fffaf4;
                        border:1px solid #e7dbce;
                        border-radius:20px;
                        padding:25px;
                        transition:0.2s;
                    "
                >

                    <div
                        style="
                            width:42px;
                            height:42px;
                            border-radius:12px;
                            background:#f0dfd4;
                            display:flex;
                            align-items:center;
                            justify-content:center;
                            color:#a65d4f;
                            font-weight:bold;
                            margin-bottom:18px;
                        "
                    >
                        K
                    </div>

                    <h3
                        style="
                            font-family:Georgia,serif;
                            font-size:20px;
                            color:#3d3438;
                            margin-bottom:5px;
                        "
                    >
                        Karya Saya
                    </h3>

                    <p
                        style="
                            font-size:13px;
                            color:#766b6b;
                        "
                    >
                        Lihat dan kelola karya yang
                        kamu publikasikan.
                    </p>

                </a>


                <!-- PROFILE -->

                <a
                    href="{{ route('mahasiswa.profile') }}"
                    style="
                        background:#fffaf4;
                        border:1px solid #e7dbce;
                        border-radius:20px;
                        padding:25px;
                    "
                >

                    <div
                        style="
                            width:42px;
                            height:42px;
                            border-radius:12px;
                            background:#e2eadc;
                            display:flex;
                            align-items:center;
                            justify-content:center;
                            color:#55704d;
                            font-weight:bold;
                            margin-bottom:18px;
                        "
                    >
                        P
                    </div>

                    <h3
                        style="
                            font-family:Georgia,serif;
                            font-size:20px;
                            color:#3d3438;
                            margin-bottom:5px;
                        "
                    >
                        Profile
                    </h3>

                    <p
                        style="
                            font-size:13px;
                            color:#766b6b;
                        "
                    >
                        Lihat dan ubah informasi
                        profile kamu.
                    </p>

                </a>

            </div>

        </section>


        <!-- FOOTER -->

        <div
            style="
                margin-top:50px;
                padding-top:20px;
                border-top:1px solid #e2d7cc;
                font-size:11px;
                color:#9c8b83;
            "
        >
            LP3I Digital Times — Menuju Kampus Digital 2026
        </div>

    </main>

</div>


<!-- =========================
     RESPONSIVE
========================= -->

<style>

@media (max-width: 800px) {

    aside {
        width: 190px !important;
    }

    main {
        margin-left:190px !important;
        width:calc(100% - 190px) !important;
        padding:30px !important;
    }

}

@media (max-width: 600px) {

    aside {
        position:relative !important;
        width:100% !important;
        min-height:auto !important;
    }

    main {
        margin-left:0 !important;
        width:100% !important;
        padding:25px !important;
    }

    body > div {
        display:block !important;
    }

}

</style>


</body>
</html>