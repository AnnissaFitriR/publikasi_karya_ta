<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Admin - LP3I Purwakarta</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<div
    style="
        min-height:100vh;
        background:#f7f1e8;
        display:flex;
        align-items:center;
        justify-content:center;
        padding:30px;
        box-sizing:border-box;
    "
>

    <!-- CONTAINER -->

    <div
        style="
            width:100%;
            max-width:950px;
            min-height:580px;
            display:grid;
            grid-template-columns:1fr 1fr;
            background:#fffaf4;
            border:1px solid #e5d9ce;
            border-radius:28px;
            overflow:hidden;
            box-shadow:0 20px 60px rgba(61,52,56,0.10);
        "
    >

        <!-- =========================
             LEFT SIDE
        ========================= -->

        <div
            style="
                background:linear-gradient(
                    145deg,
                    #3d3438,
                    #685154
                );
                color:#fff;
                padding:50px;
                display:flex;
                flex-direction:column;
                justify-content:space-between;
                position:relative;
                overflow:hidden;
            "
        >

            <!-- LOGO -->

            <div
                style="
                    font-family:Georgia,serif;
                    font-size:27px;
                    font-weight:bold;
                    position:relative;
                    z-index:2;
                "
            >
                LP3I<span style="color:#d7a65b;">.</span>
            </div>


            <!-- TEXT -->

            <div
                style="
                    position:relative;
                    z-index:2;
                    max-width:350px;
                "
            >

                <div
                    style="
                        display:inline-block;
                        padding:7px 12px;
                        border:1px solid rgba(255,255,255,0.2);
                        background:rgba(255,255,255,0.08);
                        border-radius:30px;
                        font-size:10px;
                        letter-spacing:1.5px;
                        margin-bottom:20px;
                    "
                >
                    ADMINISTRATOR
                </div>


                <h1
                    style="
                        font-family:Georgia,serif;
                        font-size:38px;
                        line-height:1.15;
                        margin-bottom:18px;
                    "
                >
                    Ruang untuk<br>
                    mengelola karya.
                </h1>


                <p
                    style="
                        color:#e3d8d2;
                        font-size:14px;
                        line-height:1.8;
                    "
                >
                    Kelola publikasi karya mahasiswa
                    dan kategori karya LP3I Purwakarta
                    melalui ruang administrasi.
                </p>

            </div>


            <!-- FOOTER -->

            <div
                style="
                    position:relative;
                    z-index:2;
                    font-size:11px;
                    color:#bdb0aa;
                "
            >
                LP3I Digital Times — 2026
            </div>


            <!-- DECORATION -->

            <div
                style="
                    position:absolute;
                    width:330px;
                    height:330px;
                    border:1px solid rgba(255,255,255,0.10);
                    border-radius:50%;
                    right:-170px;
                    top:80px;
                "
            ></div>


            <div
                style="
                    position:absolute;
                    width:210px;
                    height:210px;
                    border:1px solid rgba(215,166,91,0.18);
                    border-radius:50%;
                    right:-70px;
                    top:140px;
                "
            ></div>

        </div>


        <!-- =========================
             RIGHT SIDE
        ========================= -->

        <div
            style="
                padding:55px 50px;
                display:flex;
                align-items:center;
                justify-content:center;
            "
        >

            <div style="width:100%;max-width:360px;">

                <!-- HEADER -->

                <div style="margin-bottom:32px;">

                    <p
                        style="
                            color:#a65d4f;
                            font-size:11px;
                            font-weight:bold;
                            text-transform:uppercase;
                            letter-spacing:1.5px;
                            margin-bottom:8px;
                        "
                    >
                        Welcome Back
                    </p>


                    <h2
                        style="
                            font-family:Georgia,serif;
                            color:#3d3438;
                            font-size:34px;
                            margin-bottom:8px;
                        "
                    >
                        Login Admin
                    </h2>


                    <p
                        style="
                            color:#817570;
                            font-size:13px;
                            line-height:1.6;
                        "
                    >
                        Masuk untuk mengelola publikasi
                        karya mahasiswa.
                    </p>

                </div>


                <!-- ERROR -->

                @if ($errors->any())

                    <div
                        style="
                            background:#f7dfda;
                            border:1px solid #e6b8ad;
                            color:#8a4439;
                            padding:13px 15px;
                            border-radius:12px;
                            margin-bottom:22px;
                            font-size:12px;
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
                    action="{{ route('admin.login.process') }}"
                    method="POST"
                >

                    @csrf


                    <!-- EMAIL -->

                    <div style="margin-bottom:20px;">

                        <label
                            for="email"
                            style="
                                display:block;
                                color:#51484a;
                                font-size:12px;
                                font-weight:bold;
                                margin-bottom:8px;
                            "
                        >
                            Email Admin
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="admin@gmail.com"
                            required
                            style="
                                width:100%;
                                box-sizing:border-box;
                                padding:14px 15px;
                                border:1px solid #d9cabb;
                                border-radius:12px;
                                background:#fff;
                                color:#3d3438;
                                outline:none;
                                font-size:13px;
                            "
                        >

                    </div>


                    <!-- PASSWORD -->

                    <div style="margin-bottom:28px;">

                        <label
                            for="password"
                            style="
                                display:block;
                                color:#51484a;
                                font-size:12px;
                                font-weight:bold;
                                margin-bottom:8px;
                            "
                        >
                            Password
                        </label>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Masukkan password"
                            required
                            style="
                                width:100%;
                                box-sizing:border-box;
                                padding:14px 15px;
                                border:1px solid #d9cabb;
                                border-radius:12px;
                                background:#fff;
                                color:#3d3438;
                                outline:none;
                                font-size:13px;
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
                            background:#3d3438;
                            color:#fff;
                            border-radius:30px;
                            font-size:13px;
                            font-weight:bold;
                            cursor:pointer;
                        "
                    >
                        Masuk ke Dashboard
                    </button>

                </form>


                <!-- BACK -->

                <div
                    style="
                        text-align:center;
                        margin-top:25px;
                    "
                >

                    <a
                        href="{{ route('login') }}"
                        style="
                            color:#a65d4f;
                            font-size:12px;
                            font-weight:bold;
                        "
                    >
                        ← Kembali ke Login Mahasiswa
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>


<!-- RESPONSIVE -->

<style>

@media (max-width: 750px) {

    body > div > div {
        grid-template-columns:1fr !important;
    }

    body > div > div > div:first-child {
        min-height:320px;
        padding:35px;
    }

    body > div > div > div:last-child {
        padding:40px 30px;
    }

}

</style>

</body>
</html>