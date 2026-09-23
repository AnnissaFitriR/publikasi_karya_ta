<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Karya Saya - LP3I Purwakarta</title>

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
                    color:#d8cbc2;
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
                    background:#56494d;
                    color:#fff;
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

        <!-- HEADER -->

        <div
            style="
                display:flex;
                justify-content:space-between;
                align-items:center;
                gap:20px;
                margin-bottom:30px;
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
                    Ruang Karya
                </p>

                <h1
                    style="
                        font-family:Georgia,serif;
                        font-size:38px;
                        color:#3d3438;
                        margin-bottom:6px;
                    "
                >
                    Karya Saya
                </h1>

                <p
                    style="
                        color:#766b6b;
                        font-size:14px;
                    "
                >
                    Kelola karya yang telah kamu unggah.
                </p>

            </div>


            <a
                href="{{ route('mahasiswa.karya.create') }}"
                style="
                    display:inline-block;
                    padding:13px 20px;
                    background:#3d3438;
                    color:#fff;
                    border-radius:30px;
                    font-size:13px;
                    font-weight:bold;
                "
            >
                + Tambah Karya
            </a>

        </div>


        <!-- =========================
             SUCCESS MESSAGE
        ========================= -->

        @if (session('success'))

            <div
                style="
                    background:#e4eee0;
                    border:1px solid #c8d9c0;
                    color:#55704d;
                    padding:14px 18px;
                    border-radius:13px;
                    margin-bottom:25px;
                    font-size:13px;
                "
            >
                {{ session('success') }}
            </div>

        @endif


        <!-- =========================
             KARYA
        ========================= -->

        @if ($karya->count() > 0)

            <div
                style="
                    display:grid;
                    grid-template-columns:repeat(2, minmax(0, 1fr));
                    gap:22px;
                "
            >

                @foreach ($karya as $item)

                    <article
                        style="
                            background:#fffaf4;
                            border:1px solid #e7dbce;
                            border-radius:22px;
                            overflow:hidden;
                        "
                    >

                        <!-- PREVIEW -->

                        <div
                            style="
                                height:230px;
                                background:#eee4da;
                                overflow:hidden;
                                display:flex;
                                align-items:center;
                                justify-content:center;
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


                                @if (
                                    in_array(
                                        $extension,
                                        ['jpg', 'jpeg', 'png', 'webp']
                                    )
                                )

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
                                            color:#766b6b;
                                        "
                                    >

                                        <strong>
                                            File Karya
                                        </strong>

                                        <div
                                            style="
                                                font-size:12px;
                                                margin-top:5px;
                                            "
                                        >
                                            {{ strtoupper($extension) }}
                                        </div>

                                    </div>

                                @endif

                            @else

                                <span
                                    style="
                                        color:#9c8b83;
                                        font-size:13px;
                                    "
                                >
                                    Belum Ada Preview
                                </span>

                            @endif

                        </div>


                        <!-- CONTENT -->

                        <div style="padding:22px;">

                            <!-- KATEGORI + STATUS -->

                            <div
                                style="
                                    display:flex;
                                    justify-content:space-between;
                                    align-items:center;
                                    gap:10px;
                                    margin-bottom:12px;
                                "
                            >

                                <span class="artwork-category">
                                    {{ $item->kategori->nama_kategori }}
                                </span>


                                @if ($item->status === 'disetujui')

                                    <span
                                        style="
                                            padding:6px 10px;
                                            border-radius:20px;
                                            background:#e4eee0;
                                            color:#55704d;
                                            font-size:11px;
                                            font-weight:bold;
                                        "
                                    >
                                        Disetujui
                                    </span>

                                @elseif ($item->status === 'ditolak')

                                    <span
                                        style="
                                            padding:6px 10px;
                                            border-radius:20px;
                                            background:#f7dfda;
                                            color:#8a4439;
                                            font-size:11px;
                                            font-weight:bold;
                                        "
                                    >
                                        Ditolak
                                    </span>

                                @else

                                    <span
                                        style="
                                            padding:6px 10px;
                                            border-radius:20px;
                                            background:#f3ead5;
                                            color:#8a6a37;
                                            font-size:11px;
                                            font-weight:bold;
                                        "
                                    >
                                        Menunggu
                                    </span>

                                @endif

                            </div>


                            <!-- JUDUL -->

                            <h2
                                style="
                                    font-family:Georgia,serif;
                                    font-size:23px;
                                    color:#3d3438;
                                    margin-bottom:8px;
                                "
                            >
                                {{ $item->judul }}
                            </h2>


                            <!-- DESKRIPSI -->

                            <p
                                style="
                                    color:#766b6b;
                                    font-size:13px;
                                    line-height:1.7;
                                    margin-bottom:15px;
                                "
                            >
                                {{ $item->deskripsi }}
                            </p>


                            <!-- CATATAN ADMIN -->

                            @if ($item->status === 'ditolak' && $item->catatan)

                                <div
                                    style="
                                        background:#fff1ed;
                                        border-left:3px solid #b96c5c;
                                        padding:13px 15px;
                                        border-radius:8px;
                                        margin-bottom:18px;
                                    "
                                >

                                    <div
                                        style="
                                            font-size:11px;
                                            font-weight:bold;
                                            color:#8a4439;
                                            text-transform:uppercase;
                                            margin-bottom:5px;
                                        "
                                    >
                                        Catatan Admin
                                    </div>

                                    <div
                                        style="
                                            font-size:13px;
                                            color:#76504a;
                                            line-height:1.6;
                                        "
                                    >
                                        {{ $item->catatan }}
                                    </div>

                                </div>

                            @endif


                            <!-- ACTION -->

                            <div
                                style="
                                    display:flex;
                                    justify-content:space-between;
                                    align-items:center;
                                    padding-top:15px;
                                    border-top:1px solid #e7dbce;
                                "
                            >

                                <a
                                    href="{{ route('mahasiswa.karya.edit', $item->id_karya) }}"
                                    style="
                                        color:#a65d4f;
                                        font-size:13px;
                                        font-weight:bold;
                                    "
                                >
                                    Edit Karya
                                </a>


                                <form
                                    action="{{ route('mahasiswa.karya.destroy', $item->id_karya) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus karya ini?')"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        style="
                                            border:none;
                                            background:none;
                                            color:#9a6961;
                                            font-size:13px;
                                            cursor:pointer;
                                        "
                                    >
                                        Hapus
                                    </button>

                                </form>

                            </div>

                        </div>

                    </article>

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
                        width:60px;
                        height:60px;
                        border-radius:18px;
                        background:#f0dfd4;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        margin:0 auto 18px;
                        color:#a65d4f;
                        font-size:20px;
                        font-weight:bold;
                    "
                >
                    K
                </div>


                <h2
                    style="
                        font-family:Georgia,serif;
                        font-size:26px;
                        color:#3d3438;
                        margin-bottom:8px;
                    "
                >
                    Belum Ada Karya
                </h2>


                <p
                    style="
                        color:#766b6b;
                        font-size:14px;
                        margin-bottom:22px;
                    "
                >
                    Yuk, mulai bagikan karya pertamamu.
                </p>


                <a
                    href="{{ route('mahasiswa.karya.create') }}"
                    style="
                        display:inline-block;
                        padding:12px 20px;
                        background:#3d3438;
                        color:#fff;
                        border-radius:30px;
                        font-size:13px;
                        font-weight:bold;
                    "
                >
                    + Tambah Karya
                </a>

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

@media (max-width: 900px) {

    aside {
        width:190px !important;
    }

    main {
        margin-left:190px !important;
        width:calc(100% - 190px) !important;
        padding:30px !important;
    }

    main > div > article {
        grid-template-columns:1fr !important;
    }

}

@media (max-width: 650px) {

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

    main > div {
        grid-template-columns:1fr !important;
    }

}

</style>


</body>
</html>