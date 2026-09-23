<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profil Mahasiswa - LP3I Purwakarta</title>

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
                    background:#56494d;
                    color:#fff;
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

        <div style="margin-bottom:30px;">

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
                Akun Mahasiswa
            </p>


            <h1
                style="
                    font-family:Georgia,serif;
                    font-size:38px;
                    color:#3d3438;
                    margin-bottom:8px;
                "
            >
                Profil Saya
            </h1>


            <p
                style="
                    color:#766b6b;
                    font-size:14px;
                "
            >
                Kelola informasi profil kamu.
            </p>

        </div>


        <!-- =========================
             SUCCESS
        ========================= -->

        @if (session('success'))

            <div
                style="
                    max-width:850px;
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
             ERROR
        ========================= -->

        @if ($errors->any())

            <div
                style="
                    max-width:850px;
                    background:#f7dfda;
                    border:1px solid #e6b8ad;
                    color:#8a4439;
                    padding:15px 18px;
                    border-radius:13px;
                    margin-bottom:25px;
                    font-size:13px;
                "
            >

                <strong>
                    Ada data yang perlu diperbaiki:
                </strong>

                <ul style="margin:8px 0 0 18px;">

                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <!-- =========================
             PROFILE CARD
        ========================= -->

        <div
            style="
                max-width:850px;
                background:#fffaf4;
                border:1px solid #e7dbce;
                border-radius:24px;
                padding:35px;
            "
        >

            <!-- PROFILE HEADER -->

            <div
                style="
                    display:flex;
                    align-items:center;
                    gap:25px;
                    padding-bottom:30px;
                    margin-bottom:30px;
                    border-bottom:1px solid #e7dbce;
                "
            >

                <!-- FOTO -->

                <div
                    style="
                        width:105px;
                        height:105px;
                        border-radius:50%;
                        overflow:hidden;
                        background:#eee2d7;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        flex-shrink:0;
                    "
                >

                    @if ($mahasiswa->foto)

                        <img
                            src="{{ asset('storage/' . $mahasiswa->foto) }}"
                            alt="Foto Profil"
                            style="
                                width:100%;
                                height:100%;
                                object-fit:cover;
                            "
                        >

                    @else

                        <span
                            style="
                                font-family:Georgia,serif;
                                font-size:32px;
                                color:#a65d4f;
                            "
                        >
                            {{ strtoupper(substr($mahasiswa->nama, 0, 1)) }}
                        </span>

                    @endif

                </div>


                <!-- INFO -->

                <div>

                    <h2
                        style="
                            font-family:Georgia,serif;
                            font-size:27px;
                            color:#3d3438;
                            margin-bottom:5px;
                        "
                    >
                        {{ $mahasiswa->nama }}
                    </h2>


                    <p
                        style="
                            color:#766b6b;
                            font-size:13px;
                            margin-bottom:4px;
                        "
                    >
                        {{ $mahasiswa->program_studi }}
                    </p>


                    <p
                        style="
                            color:#a65d4f;
                            font-size:12px;
                            font-weight:bold;
                        "
                    >
                        NIPD: {{ $mahasiswa->nipd }}
                    </p>

                </div>

            </div>


            <!-- FORM -->

            <form
                action="{{ route('mahasiswa.profile.update') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf
                @method('PUT')


                <!-- NIPD -->

                <div style="margin-bottom:22px;">

                    <label
                        style="
                            display:block;
                            font-size:13px;
                            font-weight:bold;
                            color:#51484a;
                            margin-bottom:8px;
                        "
                    >
                        NIPD
                    </label>

                    <input
                        type="text"
                        value="{{ $mahasiswa->nipd }}"
                        disabled
                        style="
                            width:100%;
                            padding:14px 15px;
                            border:1px solid #ded3c9;
                            border-radius:12px;
                            background:#eee9e3;
                            color:#817873;
                            box-sizing:border-box;
                        "
                    >

                    <p
                        style="
                            font-size:11px;
                            color:#9c8b83;
                            margin-top:6px;
                        "
                    >
                        NIPD tidak dapat diubah.
                    </p>

                </div>


                <!-- NAMA -->

                <div style="margin-bottom:22px;">

                    <label
                        for="nama"
                        style="
                            display:block;
                            font-size:13px;
                            font-weight:bold;
                            color:#51484a;
                            margin-bottom:8px;
                        "
                    >
                        Nama Lengkap
                    </label>

                    <input
                        type="text"
                        id="nama"
                        name="nama"
                        value="{{ $mahasiswa->nama }}"
                        required
                        style="
                            width:100%;
                            padding:14px 15px;
                            border:1px solid #d9cabb;
                            border-radius:12px;
                            background:#fff;
                            color:#3d3438;
                            box-sizing:border-box;
                        "
                    >

                </div>


                <!-- PROGRAM STUDI -->

                <div style="margin-bottom:22px;">

                    <label
                        for="program_studi"
                        style="
                            display:block;
                            font-size:13px;
                            font-weight:bold;
                            color:#51484a;
                            margin-bottom:8px;
                        "
                    >
                        Program Studi
                    </label>

                    <input
                        type="text"
                        id="program_studi"
                        name="program_studi"
                        value="{{ $mahasiswa->program_studi }}"
                        required
                        style="
                            width:100%;
                            padding:14px 15px;
                            border:1px solid #d9cabb;
                            border-radius:12px;
                            background:#fff;
                            color:#3d3438;
                            box-sizing:border-box;
                        "
                    >

                </div>


                <!-- EMAIL -->

                <div style="margin-bottom:22px;">

                    <label
                        for="email"
                        style="
                            display:block;
                            font-size:13px;
                            font-weight:bold;
                            color:#51484a;
                            margin-bottom:8px;
                        "
                    >
                        Email
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ $mahasiswa->email }}"
                        required
                        style="
                            width:100%;
                            padding:14px 15px;
                            border:1px solid #d9cabb;
                            border-radius:12px;
                            background:#fff;
                            color:#3d3438;
                            box-sizing:border-box;
                        "
                    >

                </div>


                <!-- FOTO -->

                <div style="margin-bottom:30px;">

                    <label
                        for="foto"
                        style="
                            display:block;
                            font-size:13px;
                            font-weight:bold;
                            color:#51484a;
                            margin-bottom:8px;
                        "
                    >
                        Foto Profil
                    </label>


                    <div
                        style="
                            border:1.5px dashed #cdbdad;
                            background:#faf5ef;
                            border-radius:16px;
                            padding:20px;
                        "
                    >

                        <input
                            type="file"
                            id="foto"
                            name="foto"
                            accept="image/*"
                            style="
                                width:100%;
                                color:#51484a;
                                font-size:13px;
                            "
                        >


                        <p
                            style="
                                margin-top:10px;
                                margin-bottom:0;
                                color:#8d817b;
                                font-size:12px;
                            "
                        >
                            Pilih gambar baru jika ingin mengganti
                            foto profil.
                        </p>

                    </div>

                </div>


                <!-- BUTTON -->

                <div
                    style="
                        display:flex;
                        justify-content:flex-end;
                        padding-top:20px;
                        border-top:1px solid #e7dbce;
                    "
                >

                    <button
                        type="submit"
                        style="
                            border:none;
                            padding:13px 25px;
                            background:#3d3438;
                            color:#fff;
                            border-radius:30px;
                            font-size:13px;
                            font-weight:bold;
                            cursor:pointer;
                        "
                    >
                        Simpan Perubahan
                    </button>

                </div>

            </form>

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

}

</style>


</body>
</html>