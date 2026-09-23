<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Mahasiswa - LP3I Purwakarta</title>

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
     LOGIN
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
                max-width:460px;
                background:#fffaf4;
                border:1px solid #e7dbce;
                border-radius:28px;
                padding:42px;
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
                        font-size:38px;
                        color:#3d3438;
                        margin:14px 0 8px;
                    "
                >
                    Selamat Datang
                </h1>

                <p
                    style="
                        color:#766b6b;
                        font-size:14px;
                    "
                >
                    Masuk untuk mengelola dan mempublikasikan
                    karya kamu.
                </p>

            </div>


            <!-- ERROR -->

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

                    @foreach ($errors->all() as $error)

                        <div>
                            {{ $error }}
                        </div>

                    @endforeach

                </div>

            @endif


            <!-- FORM -->

            <form
                action="{{ route('mahasiswa.login') }}"
                method="POST"
            >

                @csrf


                <!-- EMAIL -->

                <div style="margin-bottom:20px;">

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
                        placeholder="Masukkan email"
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

                <div style="margin-bottom:25px;">

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
                    Login
                </button>

            </form>


            <!-- REGISTER -->

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

                Belum punya akun?

                <a
                    href="{{ route('register') }}"
                    style="
                        color:#a65d4f;
                        font-weight:bold;
                    "
                >
                    Daftar di sini
                </a>

                <p>
                    Login sebagai Admin?
                    <a href="{{ route('admin.login') }}"
                    style="
                        color:#a65d4f;
                        font-weight:bold;
                    "
                    >Masuk di sini</a>
                </p>

            </div>

        </div>

    </div>

</section>


</body>
</html>