<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registrasi Mahasiswa - LP3I Purwakarta</title>

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

        </div>

    </div>

</nav>


<!-- =========================
     REGISTER
========================= -->

<section
    style="
        min-height:calc(100vh - 72px);
        display:flex;
        align-items:center;
        padding:60px 0;
    "
>

    <div
        class="container"
        style="
            display:flex;
            justify-content:center;
        "
    >

        <div
            style="
                width:100%;
                max-width:520px;
                background:#fffaf4;
                border:1px solid #e7dbce;
                border-radius:28px;
                padding:40px;
                box-shadow:0 15px 40px rgba(65,49,45,0.08);
            "
        >

            <!-- HEADER -->

            <div style="text-align:center; margin-bottom:30px;">

                <span
                    class="hero-label"
                    style="
                        background:#eee2d7;
                        border:none;
                        color:#8d5549;
                    "
                >
                    MAHASISWA LP3I
                </span>

                <h1
                    style="
                        font-family:Georgia,serif;
                        font-size:36px;
                        color:#3d3438;
                        margin:14px 0 8px;
                    "
                >
                    Buat Akun
                </h1>

                <p
                    style="
                        color:#766b6b;
                        font-size:14px;
                    "
                >
                    Daftarkan dirimu untuk mulai mempublikasikan
                    karya di LP3I Purwakarta.
                </p>

            </div>


            <!-- ERROR VALIDATION -->

            @if ($errors->any())

                <div
                    style="
                        background:#f7dfda;
                        border:1px solid #e6b8ad;
                        color:#8a4439;
                        padding:14px 16px;
                        border-radius:12px;
                        margin-bottom:20px;
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


            <!-- FORM -->

            <form
                action="{{ route('mahasiswa.register') }}"
                method="POST"
            >

                @csrf


                <!-- NIPD -->

                <div style="margin-bottom:18px;">

                    <label
                        for="nipd"
                        style="
                            display:block;
                            font-size:13px;
                            font-weight:bold;
                            color:#51484a;
                            margin-bottom:7px;
                        "
                    >
                        NIPD
                    </label>

                    <input
                        type="text"
                        id="nipd"
                        name="nipd"
                        value="{{ old('nipd') }}"
                        required
                        placeholder="Masukkan NIPD"
                        style="
                            width:100%;
                            padding:13px 15px;
                            border:1px solid #d9cabb;
                            border-radius:12px;
                            background:#fff;
                            color:#3d3438;
                            outline:none;
                        "
                    >

                </div>


                <!-- NAMA -->

                <div style="margin-bottom:18px;">

                    <label
                        for="nama"
                        style="
                            display:block;
                            font-size:13px;
                            font-weight:bold;
                            color:#51484a;
                            margin-bottom:7px;
                        "
                    >
                        Nama Lengkap
                    </label>

                    <input
                        type="text"
                        id="nama"
                        name="nama"
                        value="{{ old('nama') }}"
                        required
                        placeholder="Masukkan nama lengkap"
                        style="
                            width:100%;
                            padding:13px 15px;
                            border:1px solid #d9cabb;
                            border-radius:12px;
                            background:#fff;
                            color:#3d3438;
                            outline:none;
                        "
                    >

                </div>


                <!-- PROGRAM STUDI -->

                <div style="margin-bottom:18px;">

                    <label
                        for="program_studi"
                        style="
                            display:block;
                            font-size:13px;
                            font-weight:bold;
                            color:#51484a;
                            margin-bottom:7px;
                        "
                    >
                        Program Studi
                    </label>

                    <input
                        type="text"
                        id="program_studi"
                        name="program_studi"
                        value="{{ old('program_studi') }}"
                        required
                        placeholder="Masukkan program studi"
                        style="
                            width:100%;
                            padding:13px 15px;
                            border:1px solid #d9cabb;
                            border-radius:12px;
                            background:#fff;
                            color:#3d3438;
                            outline:none;
                        "
                    >

                </div>


                <!-- EMAIL -->

                <div style="margin-bottom:18px;">

                    <label
                        for="email"
                        style="
                            display:block;
                            font-size:13px;
                            font-weight:bold;
                            color:#51484a;
                            margin-bottom:7px;
                        "
                    >
                        Email
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        placeholder="contoh@email.com"
                        style="
                            width:100%;
                            padding:13px 15px;
                            border:1px solid #d9cabb;
                            border-radius:12px;
                            background:#fff;
                            color:#3d3438;
                            outline:none;
                        "
                    >

                </div>


                <!-- PASSWORD -->

                <div style="margin-bottom:18px;">

                    <label
                        for="password"
                        style="
                            display:block;
                            font-size:13px;
                            font-weight:bold;
                            color:#51484a;
                            margin-bottom:7px;
                        "
                    >
                        Password
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        required
                        placeholder="Masukkan password"
                        style="
                            width:100%;
                            padding:13px 15px;
                            border:1px solid #d9cabb;
                            border-radius:12px;
                            background:#fff;
                            color:#3d3438;
                            outline:none;
                        "
                    >

                </div>


                <!-- KONFIRMASI PASSWORD -->

                <div style="margin-bottom:25px;">

                    <label
                        for="password_confirmation"
                        style="
                            display:block;
                            font-size:13px;
                            font-weight:bold;
                            color:#51484a;
                            margin-bottom:7px;
                        "
                    >
                        Konfirmasi Password
                    </label>

                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        required
                        placeholder="Ulangi password"
                        style="
                            width:100%;
                            padding:13px 15px;
                            border:1px solid #d9cabb;
                            border-radius:12px;
                            background:#fff;
                            color:#3d3438;
                            outline:none;
                        "
                    >

                </div>


                <!-- BUTTON -->

                <button
                    type="submit"
                    style="
                        width:100%;
                        border:none;
                        padding:14px;
                        border-radius:30px;
                        background:#3d3438;
                        color:#fff;
                        font-size:14px;
                        font-weight:bold;
                        cursor:pointer;
                    "
                >
                    Daftar Sekarang
                </button>

            </form>


            <!-- LOGIN -->

            <div
                style="
                    text-align:center;
                    margin-top:25px;
                    padding-top:20px;
                    border-top:1px solid #e5d9cb;
                    font-size:13px;
                    color:#766b6b;
                "
            >

                Sudah punya akun?

                <a
                    href="{{ route('login') }}"
                    style="
                        color:#a65d4f;
                        font-weight:bold;
                    "
                >
                    Login di sini
                </a>

            </div>

        </div>

    </div>

</section>


</body>
</html>