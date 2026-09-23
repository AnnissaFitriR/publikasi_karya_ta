<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kelola Karya - LP3I Purwakarta</title>

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
                    color:#d8cbc2;
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
                    background:#56494d;
                    color:#fff;
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
                display:flex;
                justify-content:space-between;
                align-items:flex-end;
                margin-bottom:35px;
                gap:20px;
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
                    Kelola Karya
                </h1>


                <p
                    style="
                        color:#766b6b;
                        font-size:14px;
                    "
                >
                    Periksa karya mahasiswa sebelum dipublikasikan.
                </p>

            </div>


            <a
                href="{{ route('admin.dashboard') }}"
                style="
                    display:inline-block;
                    padding:11px 18px;
                    border:1px solid #d5c7bb;
                    border-radius:30px;
                    color:#766b6b;
                    font-size:12px;
                    font-weight:bold;
                    background:#fffaf4;
                "
            >
                ← Dashboard
            </a>

        </div>


        <!-- =========================
             CONTENT
        ========================= -->

        @if ($karya->count() > 0)

            <div
                style="
                    display:grid;
                    grid-template-columns:repeat(3, minmax(0, 1fr));
                    gap:22px;
                "
            >

                @foreach ($karya as $item)

                    <div
                        style="
                            background:#fffaf4;
                            border:1px solid #e7dbce;
                            border-radius:22px;
                            overflow:hidden;
                            display:flex;
                            flex-direction:column;
                        "
                    >

                        <!-- PREVIEW -->

                        <div
                            style="
                                height:190px;
                                background:#eee4da;
                                display:flex;
                                align-items:center;
                                justify-content:center;
                                overflow:hidden;
                            "
                        >

                            @if ($item->file_karya)

                                @php
                                    $extension = strtolower(
                                        pathinfo(
                                            $item->file_karya,
                                            PATHINFO_EXTENSION
                                        )
                                    );
                                @endphp


                                @if (in_array($extension, ['jpg', 'jpeg', 'png']))

                                    <img
                                        src="{{ asset('storage/' . $item->file_karya) }}"
                                        alt="{{ $item->judul }}"
                                        style="
                                            width:100%;
                                            height:100%;
                                            object-fit:cover;
                                        "
                                    >

                                @else

                                    <div
                                        style="
                                            text-align:center;
                                            color:#8a7972;
                                        "
                                    >

                                        <div
                                            style="
                                                font-family:Georgia,serif;
                                                font-size:34px;
                                                margin-bottom:7px;
                                            "
                                        >
                                            FILE
                                        </div>

                                        <div
                                            style="
                                                font-size:11px;
                                                text-transform:uppercase;
                                            "
                                        >
                                            .{{ $extension }}
                                        </div>

                                    </div>

                                @endif

                            @else

                                <span
                                    style="
                                        color:#9c8b83;
                                        font-size:12px;
                                    "
                                >
                                    Tidak ada file
                                </span>

                            @endif

                        </div>


                        <!-- INFO -->

                        <div
                            style="
                                padding:23px;
                                display:flex;
                                flex-direction:column;
                                flex:1;
                            "
                        >

                            <!-- CATEGORY -->

                            <div
                                style="
                                    display:flex;
                                    justify-content:space-between;
                                    align-items:center;
                                    gap:10px;
                                    margin-bottom:12px;
                                "
                            >

                                <span
                                    style="
                                        display:inline-block;
                                        padding:6px 10px;
                                        border-radius:20px;
                                        background:#f0dfd4;
                                        color:#a65d4f;
                                        font-size:10px;
                                        font-weight:bold;
                                    "
                                >
                                    {{ $item->kategori->nama_kategori }}
                                </span>


                                <!-- STATUS -->

                                @if ($item->status === 'disetujui')

                                    <span
                                        style="
                                            color:#55704d;
                                            background:#e2eadc;
                                            padding:6px 9px;
                                            border-radius:20px;
                                            font-size:10px;
                                            font-weight:bold;
                                        "
                                    >
                                        Disetujui
                                    </span>

                                @elseif ($item->status === 'ditolak')

                                    <span
                                        style="
                                            color:#8a4439;
                                            background:#f7dfda;
                                            padding:6px 9px;
                                            border-radius:20px;
                                            font-size:10px;
                                            font-weight:bold;
                                        "
                                    >
                                        Ditolak
                                    </span>

                                @else

                                    <span
                                        style="
                                            color:#806b3c;
                                            background:#f3ead5;
                                            padding:6px 9px;
                                            border-radius:20px;
                                            font-size:10px;
                                            font-weight:bold;
                                        "
                                    >
                                        Menunggu
                                    </span>

                                @endif

                            </div>


                            <!-- TITLE -->

                            <h2
                                style="
                                    font-family:Georgia,serif;
                                    color:#3d3438;
                                    font-size:21px;
                                    line-height:1.3;
                                    margin-bottom:8px;
                                "
                            >
                                {{ $item->judul }}
                            </h2>


                            <!-- MAHASISWA -->

                            <p
                                style="
                                    color:#766b6b;
                                    font-size:12px;
                                    margin-bottom:10px;
                                "
                            >
                                Oleh
                                <strong>
                                    {{ $item->mahasiswa->nama }}
                                </strong>
                            </p>


                            <!-- DESKRIPSI -->

                            <p
                                style="
                                    color:#817570;
                                    font-size:12px;
                                    line-height:1.6;
                                    margin-bottom:20px;
                                    display:-webkit-box;
                                    -webkit-line-clamp:3;
                                    -webkit-box-orient:vertical;
                                    overflow:hidden;
                                "
                            >
                                {{ $item->deskripsi }}
                            </p>


                            <!-- BUTTON -->

                            <div
                                style="
                                    margin-top:auto;
                                "
                            >

                                <a
                                    href="{{ route('admin.karya.detail', $item->id_karya) }}"
                                    style="
                                        display:block;
                                        text-align:center;
                                        padding:12px;
                                        border-radius:30px;
                                        background:#3d3438;
                                        color:#fff;
                                        font-size:12px;
                                        font-weight:bold;
                                    "
                                >
                                    Lihat Detail & Kelola
                                </a>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <!-- EMPTY STATE -->

            <div
                style="
                    background:#fffaf4;
                    border:1px solid #e7dbce;
                    border-radius:24px;
                    padding:70px 30px;
                    text-align:center;
                "
            >

                <div
                    style="
                        width:65px;
                        height:65px;
                        border-radius:50%;
                        background:#eee2d7;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        margin:0 auto 20px;
                        color:#a65d4f;
                        font-family:Georgia,serif;
                        font-size:22px;
                    "
                >
                    K
                </div>


                <h2
                    style="
                        font-family:Georgia,serif;
                        color:#3d3438;
                        font-size:25px;
                        margin-bottom:8px;
                    "
                >
                    Belum Ada Karya
                </h2>


                <p
                    style="
                        color:#817570;
                        font-size:13px;
                    "
                >
                    Belum ada karya mahasiswa yang masuk
                    ke sistem.
                </p>

            </div>

        @endif


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

@media (max-width: 1050px) {

    main > div:nth-of-type(2) {
        grid-template-columns:repeat(2, minmax(0, 1fr)) !important;
    }

}

@media (max-width: 750px) {

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

    main > div:nth-of-type(2) {
        grid-template-columns:1fr !important;
    }

}

</style>


</body>
</html>