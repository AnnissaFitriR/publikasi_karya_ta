<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin - LP3I Purwakarta</title>

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


        <!-- LABEL -->

        <div
            style="
                padding:0 10px;
                font-size:10px;
                color:#a99b96;
                letter-spacing:1.5px;
                margin-bottom:10px;
            "
        >
            ADMINISTRATOR
        </div>


        <!-- MENU -->

        <nav>

            <a
                href="{{ route('admin.dashboard') }}"
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
                href="{{ route('admin.karya.index') }}"
                style="
                    display:block;
                    padding:13px 15px;
                    border-radius:12px;
                    color:#d8cbc2;
                    font-size:14px;
                    margin-bottom:8px;
                "
            >
                Kelola Karya
            </a>


            <a
                href="{{ route('admin.kategori.index') }}"
                style="
                    display:block;
                    padding:13px 15px;
                    border-radius:12px;
                    color:#d8cbc2;
                    font-size:14px;
                    margin-bottom:8px;
                "
            >
                Kelola Kategori
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
                    Admin LP3I
                </div>

            </div>


            <form
                action="{{ route('admin.logout') }}"
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

        <!-- HEADER -->

        <div
            style="
                margin-bottom:35px;
            "
        >

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
                Administrator
            </p>


            <h1
                style="
                    font-family:Georgia,serif;
                    font-size:40px;
                    color:#3d3438;
                    margin-bottom:8px;
                "
            >
                Dashboard Admin
            </h1>


            <p
                style="
                    color:#766b6b;
                    font-size:14px;
                "
            >
                Kelola karya mahasiswa dan kategori publikasi
                dari satu tempat.
            </p>

        </div>


        <!-- =========================
             WELCOME CARD
        ========================= -->

        <section
            style="
                background:linear-gradient(
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
                    max-width:620px;
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
                    RUANG KURASI
                </span>


                <h2
                    style="
                        font-family:Georgia,serif;
                        font-size:32px;
                        line-height:1.2;
                        margin-bottom:12px;
                    "
                >
                    Selamat datang, Admin LP3I.
                </h2>


                <p
                    style="
                        color:#e8ddd5;
                        font-size:14px;
                        line-height:1.7;
                        max-width:550px;
                    "
                >
                    Pantau dan kelola karya mahasiswa yang
                    akan ditampilkan dalam galeri publikasi
                    LP3I Purwakarta.
                </p>

            </div>


            <!-- DEKORASI -->

            <div
                style="
                    position:absolute;
                    width:230px;
                    height:230px;
                    border:1px solid rgba(255,255,255,0.12);
                    border-radius:50%;
                    right:-65px;
                    top:-65px;
                "
            ></div>

            <div
                style="
                    position:absolute;
                    width:150px;
                    height:150px;
                    border:1px solid rgba(255,255,255,0.10);
                    border-radius:50%;
                    right:55px;
                    bottom:-90px;
                "
            ></div>

        </section>


        <!-- =========================
             MENU UTAMA
        ========================= -->

        <section>

            <div style="margin-bottom:18px;">

                <h2
                    style="
                        font-family:Georgia,serif;
                        font-size:26px;
                        color:#3d3438;
                        margin-bottom:5px;
                    "
                >
                    Menu Admin
                </h2>

                <p
                    style="
                        color:#766b6b;
                        font-size:13px;
                    "
                >
                    Pilih bagian yang ingin kamu kelola.
                </p>

            </div>


            <div
                style="
                    display:grid;
                    grid-template-columns:repeat(2, minmax(0, 1fr));
                    gap:20px;
                "
            >

                <!-- KELOLA KARYA -->

                <a
                    href="{{ route('admin.karya.index') }}"
                    style="
                        background:#fffaf4;
                        border:1px solid #e7dbce;
                        border-radius:22px;
                        padding:28px;
                    "
                >

                    <div
                        style="
                            width:48px;
                            height:48px;
                            border-radius:14px;
                            background:#f0dfd4;
                            display:flex;
                            align-items:center;
                            justify-content:center;
                            color:#a65d4f;
                            font-weight:bold;
                            font-size:17px;
                            margin-bottom:20px;
                        "
                    >
                        K
                    </div>


                    <h3
                        style="
                            font-family:Georgia,serif;
                            font-size:22px;
                            color:#3d3438;
                            margin-bottom:7px;
                        "
                    >
                        Kelola Karya
                    </h3>


                    <p
                        style="
                            color:#766b6b;
                            font-size:13px;
                            line-height:1.6;
                            margin-bottom:18px;
                        "
                    >
                        Lihat karya mahasiswa dan kelola
                        status publikasinya.
                    </p>


                    <span
                        style="
                            color:#a65d4f;
                            font-size:13px;
                            font-weight:bold;
                        "
                    >
                        Buka Kelola Karya →
                    </span>

                </a>


                <!-- KELOLA KATEGORI -->

                <a
                    href="{{ route('admin.kategori.index') }}"
                    style="
                        background:#fffaf4;
                        border:1px solid #e7dbce;
                        border-radius:22px;
                        padding:28px;
                    "
                >

                    <div
                        style="
                            width:48px;
                            height:48px;
                            border-radius:14px;
                            background:#e2eadc;
                            display:flex;
                            align-items:center;
                            justify-content:center;
                            color:#55704d;
                            font-weight:bold;
                            font-size:17px;
                            margin-bottom:20px;
                        "
                    >
                        C
                    </div>


                    <h3
                        style="
                            font-family:Georgia,serif;
                            font-size:22px;
                            color:#3d3438;
                            margin-bottom:7px;
                        "
                    >
                        Kelola Kategori
                    </h3>


                    <p
                        style="
                            color:#766b6b;
                            font-size:13px;
                            line-height:1.6;
                            margin-bottom:18px;
                        "
                    >
                        Tambah, ubah, dan kelola kategori
                        karya mahasiswa.
                    </p>


                    <span
                        style="
                            color:#55704d;
                            font-size:13px;
                            font-weight:bold;
                        "
                    >
                        Buka Kelola Kategori →
                    </span>

                </a>

            </div>

        </section>


        <!-- =========================
             CATATAN
        ========================= -->

        <div
            style="
                margin-top:30px;
                background:#f3ead5;
                border:1px solid #e6d8b8;
                border-radius:18px;
                padding:20px 22px;
                color:#735d36;
            "
        >

            <div
                style="
                    font-size:12px;
                    font-weight:bold;
                    margin-bottom:6px;
                "
            >
                RUANG ADMIN
            </div>

            <p
                style="
                    font-size:13px;
                    line-height:1.6;
                "
            >
                Karya yang dikirim mahasiswa dapat diperiksa
                terlebih dahulu sebelum ditampilkan pada halaman
                publikasi.
            </p>

        </div>


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

@media (max-width: 700px) {

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

    main section > div {
        grid-template-columns:1fr !important;
    }

}

</style>


</body>
</html>