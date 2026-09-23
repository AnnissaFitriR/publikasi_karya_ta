<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Kategori - Admin LP3I</title>
</head>

<body>

<div
    style="
        min-height:100vh;
        background:#f7f1e8;
        display:flex;
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
            box-sizing:border-box;
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
                    text-decoration:none;
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
                    text-decoration:none;
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
                    background:#56494d;
                    color:#fff;
                    font-size:14px;
                    text-decoration:none;
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
            box-sizing:border-box;
        "
    >

        <!-- HEADER -->

        <div
            style="
                max-width:850px;
                margin-bottom:35px;
            "
        >

            <p
                style="
                    margin:0 0 6px;
                    color:#a65d4f;
                    font-size:11px;
                    font-weight:bold;
                    letter-spacing:1.5px;
                    text-transform:uppercase;
                "
            >
                Administrator
            </p>


            <h1
                style="
                    margin:0 0 8px;
                    color:#3d3438;
                    font-family:Georgia,serif;
                    font-size:40px;
                "
            >
                Edit Kategori
            </h1>


            <p
                style="
                    margin:0;
                    color:#766b6b;
                    font-size:14px;
                    line-height:1.6;
                "
            >
                Perbarui nama kategori untuk mengatur pengelompokan karya mahasiswa.
            </p>

        </div>


        <!-- =========================
             EDIT CARD
        ========================= -->

        <div
            style="
                max-width:850px;
                background:#fffaf4;
                border:1px solid #e5d9ce;
                border-radius:24px;
                padding:35px;
                box-sizing:border-box;
                box-shadow:0 10px 30px rgba(61,52,56,0.05);
            "
        >

            <!-- CARD HEADER -->

            <div
                style="
                    display:flex;
                    align-items:center;
                    gap:15px;
                    padding-bottom:25px;
                    margin-bottom:25px;
                    border-bottom:1px solid #e7ddd4;
                "
            >

                <div
                    style="
                        width:52px;
                        height:52px;
                        border-radius:15px;
                        background:#f0dfd4;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        color:#a65d4f;
                        font-family:Georgia,serif;
                        font-size:20px;
                        font-weight:bold;
                    "
                >
                    K
                </div>


                <div>

                    <div
                        style="
                            color:#9a8b84;
                            font-size:10px;
                            text-transform:uppercase;
                            letter-spacing:1px;
                            margin-bottom:4px;
                        "
                    >
                        Kategori yang dipilih
                    </div>


                    <div
                        style="
                            color:#3d3438;
                            font-family:Georgia,serif;
                            font-size:20px;
                            font-weight:bold;
                        "
                    >
                        {{ $kategori->nama_kategori }}
                    </div>

                </div>

            </div>


            <!-- ERROR -->

            @if ($errors->any())

                <div
                    style="
                        background:#f7dfda;
                        border:1px solid #e6b8ad;
                        color:#8a4439;
                        padding:14px 17px;
                        border-radius:13px;
                        margin-bottom:25px;
                        font-size:12px;
                    "
                >

                    @foreach ($errors->all() as $error)

                        <div style="margin-bottom:3px;">
                            {{ $error }}
                        </div>

                    @endforeach

                </div>

            @endif


            <!-- FORM -->

            <form
                action="{{ route('admin.kategori.update', $kategori->id_kategori) }}"
                method="POST"
            >

                @csrf
                @method('PUT')


                <div style="margin-bottom:25px;">

                    <label
                        for="nama_kategori"
                        style="
                            display:block;
                            color:#51484a;
                            font-size:12px;
                            font-weight:bold;
                            margin-bottom:9px;
                        "
                    >
                        Nama Kategori
                    </label>


                    <input
                        type="text"
                        id="nama_kategori"
                        name="nama_kategori"
                        value="{{ old('nama_kategori', $kategori->nama_kategori) }}"
                        required
                        style="
                            width:100%;
                            box-sizing:border-box;
                            padding:15px 16px;
                            border:1px solid #d9cabb;
                            border-radius:13px;
                            background:#fff;
                            color:#3d3438;
                            font-family:inherit;
                            font-size:14px;
                            outline:none;
                        "
                    >


                    <p
                        style="
                            margin:8px 0 0;
                            color:#9c8b83;
                            font-size:11px;
                        "
                    >
                        Masukkan nama kategori yang ingin digunakan untuk karya mahasiswa.
                    </p>

                </div>


                <!-- BUTTONS -->

                <div
                    style="
                        display:flex;
                        justify-content:flex-end;
                        align-items:center;
                        gap:10px;
                    "
                >

                    <a
                        href="{{ route('admin.kategori.index') }}"
                        style="
                            padding:12px 20px;
                            border:1px solid #d9cabb;
                            border-radius:30px;
                            background:#fffaf4;
                            color:#766b6b;
                            text-decoration:none;
                            font-size:12px;
                            font-weight:bold;
                        "
                    >
                        Batal
                    </a>


                    <button
                        type="submit"
                        style="
                            border:none;
                            padding:12px 23px;
                            background:#3d3438;
                            color:#fff;
                            border-radius:30px;
                            font-size:12px;
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
                max-width:850px;
                margin-top:45px;
                padding-top:20px;
                border-top:1px solid #e1d6cc;
                color:#9c8b83;
                font-size:11px;
            "
        >
            LP3I Digital Times — Menuju Kampus Digital 2026
        </div>

    </main>

</div>


<!-- RESPONSIVE -->

<style>

@media (max-width: 750px) {

    body > div {
        display:block !important;
    }

    aside {
        position:relative !important;
        width:100% !important;
        min-height:auto !important;
    }

    main {
        margin-left:0 !important;
        width:100% !important;
        padding:30px 20px !important;
    }

}

@media (max-width: 500px) {

    main > div:nth-child(2) {
        padding:25px !important;
    }

    main > div:nth-child(2) form > div:last-child {
        flex-direction:column;
        align-items:stretch !important;
    }

    main > div:nth-child(2) form > div:last-child a,
    main > div:nth-child(2) form > div:last-child button {
        text-align:center;
    }

}

</style>

</body>
</html>