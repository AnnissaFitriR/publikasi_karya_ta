<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Karya - LP3I Purwakarta</title>

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

        <div style="margin-bottom:30px;">

            <a
                href="{{ route('mahasiswa.karya.index') }}"
                style="
                    color:#a65d4f;
                    font-size:13px;
                    font-weight:bold;
                "
            >
                ← Kembali ke Karya Saya
            </a>


            <p
                style="
                    font-size:12px;
                    color:#a65d4f;
                    font-weight:bold;
                    text-transform:uppercase;
                    letter-spacing:1px;
                    margin-top:25px;
                    margin-bottom:5px;
                "
            >
                Kelola Karya
            </p>


            <h1
                style="
                    font-family:Georgia,serif;
                    font-size:38px;
                    color:#3d3438;
                    margin-bottom:8px;
                "
            >
                Edit Karya
            </h1>


            <p
                style="
                    color:#766b6b;
                    font-size:14px;
                "
            >
                Perbarui informasi karya kamu.
            </p>

        </div>


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
             FORM
        ========================= -->

        <form
            action="{{ route('mahasiswa.karya.update', $karya->id_karya) }}"
            method="POST"
        >

            @csrf
            @method('PUT')


            <div
                style="
                    max-width:850px;
                    background:#fffaf4;
                    border:1px solid #e7dbce;
                    border-radius:24px;
                    padding:35px;
                "
            >

                <!-- JUDUL -->

                <div style="margin-bottom:25px;">

                    <label
                        for="judul"
                        style="
                            display:block;
                            font-size:13px;
                            font-weight:bold;
                            color:#51484a;
                            margin-bottom:8px;
                        "
                    >
                        Judul Karya
                    </label>

                    <input
                        type="text"
                        id="judul"
                        name="judul"
                        value="{{ old('judul', $karya->judul) }}"
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


                <!-- KATEGORI -->

                <div style="margin-bottom:25px;">

                    <label
                        for="id_kategori"
                        style="
                            display:block;
                            font-size:13px;
                            font-weight:bold;
                            color:#51484a;
                            margin-bottom:8px;
                        "
                    >
                        Kategori
                    </label>

                    <select
                        id="id_kategori"
                        name="id_kategori"
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

                        @foreach ($kategori as $item)

                            <option
                                value="{{ $item->id_kategori }}"
                                {{ $item->id_kategori == $karya->id_kategori ? 'selected' : '' }}
                            >
                                {{ $item->nama_kategori }}
                            </option>

                        @endforeach

                    </select>

                </div>


                <!-- DESKRIPSI -->

                <div style="margin-bottom:25px;">

                    <label
                        for="deskripsi"
                        style="
                            display:block;
                            font-size:13px;
                            font-weight:bold;
                            color:#51484a;
                            margin-bottom:8px;
                        "
                    >
                        Deskripsi Karya
                    </label>

                    <textarea
                        id="deskripsi"
                        name="deskripsi"
                        rows="7"
                        required
                        style="
                            width:100%;
                            padding:14px 15px;
                            border:1px solid #d9cabb;
                            border-radius:12px;
                            background:#fff;
                            color:#3d3438;
                            resize:vertical;
                            box-sizing:border-box;
                            font-family:inherit;
                        "
                    >{{ old('deskripsi', $karya->deskripsi) }}</textarea>

                </div>


                <!-- FILE LAMA -->

                <div
                    style="
                        margin-bottom:30px;
                        background:#f8f0e8;
                        border:1px solid #e7dbce;
                        border-radius:15px;
                        padding:18px;
                    "
                >

                    <div
                        style="
                            font-size:11px;
                            color:#a65d4f;
                            font-weight:bold;
                            text-transform:uppercase;
                            margin-bottom:7px;
                        "
                    >
                        File Karya
                    </div>


                    <div
                        style="
                            font-size:13px;
                            color:#51484a;
                        "
                    >
                        File karya yang sudah diunggah tetap digunakan.
                    </div>

                </div>


                <!-- BUTTON -->

                <div
                    style="
                        display:flex;
                        justify-content:flex-end;
                        gap:12px;
                        padding-top:5px;
                        border-top:1px solid #e7dbce;
                    "
                >

                    <a
                        href="{{ route('mahasiswa.karya.index') }}"
                        style="
                            display:inline-block;
                            padding:13px 22px;
                            border:1px solid #d5c7bb;
                            color:#766b6b;
                            border-radius:30px;
                            font-size:13px;
                            font-weight:bold;
                            margin-top:20px;
                        "
                    >
                        Batal
                    </a>


                    <button
                        type="submit"
                        style="
                            border:none;
                            padding:13px 24px;
                            background:#3d3438;
                            color:#fff;
                            border-radius:30px;
                            font-size:13px;
                            font-weight:bold;
                            cursor:pointer;
                            margin-top:20px;
                        "
                    >
                        Simpan Perubahan
                    </button>

                </div>

            </div>

        </form>


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