<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Karya - Admin LP3I</title>
</head>

<body>

<div
    style="
        min-height:100vh;
        background:#f7f1e8;
        padding:40px;
        box-sizing:border-box;
    "
>

    <!-- HEADER -->

    <div
        style="
            max-width:1150px;
            margin:0 auto 30px;
            display:flex;
            justify-content:space-between;
            align-items:center;
        "
    >

        <div>

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
                    margin:0;
                    color:#3d3438;
                    font-family:Georgia,serif;
                    font-size:34px;
                "
            >
                Detail Karya
            </h1>

        </div>


        <a
            href="{{ route('admin.karya.index') }}"
            style="
                padding:11px 18px;
                border:1px solid #d5c7bb;
                border-radius:30px;
                background:#fffaf4;
                color:#766b6b;
                text-decoration:none;
                font-size:12px;
                font-weight:bold;
            "
        >
            ← Kembali ke Kelola Karya
        </a>

    </div>


    <!-- MAIN CARD -->

    <div
        style="
            max-width:1150px;
            margin:0 auto;
            display:grid;
            grid-template-columns:1.2fr 0.8fr;
            gap:25px;
        "
    >

        <!-- =========================
             LEFT : PREVIEW
        ========================= -->

        <div>

            <div
                style="
                    background:#fffaf4;
                    border:1px solid #e5d9ce;
                    border-radius:25px;
                    overflow:hidden;
                    box-shadow:0 10px 30px rgba(61,52,56,0.05);
                "
            >

                <div
                    style="
                        padding:22px 25px;
                        border-bottom:1px solid #e8ddd3;
                    "
                >

                    <h2
                        style="
                            margin:0;
                            color:#3d3438;
                            font-family:Georgia,serif;
                            font-size:22px;
                        "
                    >
                        Preview Karya
                    </h2>

                </div>


                <div
                    style="
                        min-height:480px;
                        padding:30px;
                        background:#eee5dc;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        box-sizing:border-box;
                    "
                >

                    @if ($karya->file_karya)

                        @php
                            $extension = strtolower(
                                pathinfo(
                                    $karya->file_karya,
                                    PATHINFO_EXTENSION
                                )
                            );
                        @endphp


                        @if (in_array($extension, ['jpg', 'jpeg', 'png']))

                            <img
                                src="{{ asset('storage/' . $karya->file_karya) }}"
                                alt="{{ $karya->judul }}"
                                style="
                                    max-width:100%;
                                    max-height:550px;
                                    object-fit:contain;
                                    border-radius:12px;
                                    box-shadow:0 10px 30px rgba(0,0,0,0.12);
                                "
                            >

                        @else

                            <div
                                style="
                                    text-align:center;
                                    background:#fffaf4;
                                    padding:45px 55px;
                                    border-radius:20px;
                                    border:1px solid #ded1c5;
                                "
                            >

                                <div
                                    style="
                                        font-family:Georgia,serif;
                                        font-size:42px;
                                        color:#a65d4f;
                                        margin-bottom:12px;
                                    "
                                >
                                    FILE
                                </div>

                                <p
                                    style="
                                        margin:0 0 20px;
                                        color:#817570;
                                        font-size:12px;
                                    "
                                >
                                    File karya
                                    <strong>
                                        .{{ $extension }}
                                    </strong>
                                </p>


                                <a
                                    href="{{ asset('storage/' . $karya->file_karya) }}"
                                    target="_blank"
                                    style="
                                        display:inline-block;
                                        padding:12px 22px;
                                        background:#3d3438;
                                        color:white;
                                        text-decoration:none;
                                        border-radius:30px;
                                        font-size:12px;
                                        font-weight:bold;
                                    "
                                >
                                    Lihat / Download File
                                </a>

                            </div>

                        @endif

                    @else

                        <p
                            style="
                                color:#9c8b83;
                                font-size:13px;
                            "
                        >
                            Tidak ada file karya.
                        </p>

                    @endif

                </div>

            </div>

        </div>


        <!-- =========================
             RIGHT : INFORMATION
        ========================= -->

        <div>

            <div
                style="
                    background:#fffaf4;
                    border:1px solid #e5d9ce;
                    border-radius:25px;
                    padding:30px;
                    box-shadow:0 10px 30px rgba(61,52,56,0.05);
                "
            >

                <!-- CATEGORY -->

                <span
                    style="
                        display:inline-block;
                        padding:7px 12px;
                        border-radius:20px;
                        background:#f0dfd4;
                        color:#a65d4f;
                        font-size:10px;
                        font-weight:bold;
                        margin-bottom:15px;
                    "
                >
                    {{ $karya->kategori->nama_kategori }}
                </span>


                <!-- TITLE -->

                <h2
                    style="
                        margin:0 0 18px;
                        color:#3d3438;
                        font-family:Georgia,serif;
                        font-size:30px;
                        line-height:1.25;
                    "
                >
                    {{ $karya->judul }}
                </h2>


                <!-- STATUS -->

                <div
                    style="
                        margin-bottom:25px;
                        padding:14px;
                        border-radius:14px;
                        background:#f4eee8;
                    "
                >

                    <div
                        style="
                            font-size:10px;
                            color:#948680;
                            text-transform:uppercase;
                            letter-spacing:1px;
                            margin-bottom:5px;
                        "
                    >
                        Status Publikasi
                    </div>


                    @if ($karya->status === 'disetujui')

                        <strong style="color:#55704d;">
                            ● Disetujui
                        </strong>

                    @elseif ($karya->status === 'ditolak')

                        <strong style="color:#8a4439;">
                            ● Ditolak
                        </strong>

                    @else

                        <strong style="color:#806b3c;">
                            ● Menunggu Persetujuan
                        </strong>

                    @endif

                </div>


                <!-- STUDENT INFO -->

                <div
                    style="
                        border-top:1px solid #e7ddd4;
                        border-bottom:1px solid #e7ddd4;
                        padding:20px 0;
                        margin-bottom:20px;
                    "
                >

                    <div style="margin-bottom:15px;">

                        <div
                            style="
                                color:#9a8b84;
                                font-size:10px;
                                text-transform:uppercase;
                                letter-spacing:1px;
                                margin-bottom:5px;
                            "
                        >
                            Mahasiswa
                        </div>

                        <strong
                            style="
                                color:#3d3438;
                                font-size:14px;
                            "
                        >
                            {{ $karya->mahasiswa->nama }}
                        </strong>

                    </div>


                    <div>

                        <div
                            style="
                                color:#9a8b84;
                                font-size:10px;
                                text-transform:uppercase;
                                letter-spacing:1px;
                                margin-bottom:5px;
                            "
                        >
                            NIPD
                        </div>

                        <span
                            style="
                                color:#766b6b;
                                font-size:13px;
                            "
                        >
                            {{ $karya->mahasiswa->nipd }}
                        </span>

                    </div>

                </div>


                <!-- DESCRIPTION -->

                <div style="margin-bottom:25px;">

                    <div
                        style="
                            color:#9a8b84;
                            font-size:10px;
                            text-transform:uppercase;
                            letter-spacing:1px;
                            margin-bottom:8px;
                        "
                    >
                        Deskripsi
                    </div>

                    <p
                        style="
                            margin:0;
                            color:#665b59;
                            font-size:13px;
                            line-height:1.8;
                        "
                    >
                        {{ $karya->deskripsi }}
                    </p>

                </div>


                <!-- SUCCESS -->

                @if (session('success'))

                    <div
                        style="
                            background:#e2eadc;
                            border:1px solid #c5d5bd;
                            color:#55704d;
                            padding:13px 15px;
                            border-radius:12px;
                            margin-bottom:20px;
                            font-size:12px;
                        "
                    >
                        {{ session('success') }}
                    </div>

                @endif


                <!-- ACTION -->

                @if ($karya->status === 'menunggu')

                    <div
                        style="
                            border-top:1px solid #e7ddd4;
                            padding-top:25px;
                        "
                    >

                        <p
                            style="
                                margin:0 0 15px;
                                color:#3d3438;
                                font-weight:bold;
                                font-size:13px;
                            "
                        >
                            Tindakan Admin
                        </p>


                        <!-- APPROVE -->

                        <form
                            action="{{ route('admin.karya.setujui', $karya->id_karya) }}"
                            method="POST"
                            style="margin-bottom:12px;"
                        >

                            @csrf

                            <button
                                type="submit"
                                style="
                                    width:100%;
                                    border:none;
                                    padding:13px;
                                    background:#55704d;
                                    color:#fff;
                                    border-radius:30px;
                                    font-size:12px;
                                    font-weight:bold;
                                    cursor:pointer;
                                "
                            >
                                ✓ Setujui Karya
                            </button>

                        </form>


                        <!-- REJECT -->

                        <form
                            action="{{ route('admin.karya.tolak', $karya->id_karya) }}"
                            method="POST"
                        >

                            @csrf

                            <label
                                for="catatan"
                                style="
                                    display:block;
                                    color:#51484a;
                                    font-size:12px;
                                    font-weight:bold;
                                    margin-bottom:8px;
                                "
                            >
                                Catatan / Alasan Penolakan
                            </label>


                            <textarea
                                id="catatan"
                                name="catatan"
                                rows="4"
                                required
                                placeholder="Tuliskan catatan untuk mahasiswa..."
                                style="
                                    width:100%;
                                    box-sizing:border-box;
                                    padding:13px;
                                    border:1px solid #d9cabb;
                                    border-radius:12px;
                                    resize:vertical;
                                    font-family:inherit;
                                    font-size:12px;
                                    background:#fff;
                                    margin-bottom:12px;
                                "
                            ></textarea>


                            <button
                                type="submit"
                                style="
                                    width:100%;
                                    border:1px solid #a65d4f;
                                    padding:13px;
                                    background:#fffaf4;
                                    color:#a65d4f;
                                    border-radius:30px;
                                    font-size:12px;
                                    font-weight:bold;
                                    cursor:pointer;
                                "
                            >
                                Tolak Karya
                            </button>

                        </form>

                    </div>

                @elseif ($karya->status === 'ditolak')

                    <div
                        style="
                            margin-top:20px;
                            padding:17px;
                            background:#f7dfda;
                            border:1px solid #e6b8ad;
                            border-radius:14px;
                        "
                    >

                        <div
                            style="
                                color:#8a4439;
                                font-size:10px;
                                font-weight:bold;
                                text-transform:uppercase;
                                letter-spacing:1px;
                                margin-bottom:7px;
                            "
                        >
                            Catatan Penolakan
                        </div>

                        <p
                            style="
                                margin:0;
                                color:#70453e;
                                font-size:12px;
                                line-height:1.6;
                            "
                        >
                            {{ $karya->catatan }}
                        </p>

                    </div>

                @endif

            </div>

        </div>

    </div>


    <!-- FOOTER -->

    <div
        style="
            max-width:1150px;
            margin:35px auto 0;
            padding-top:20px;
            border-top:1px solid #e1d6cc;
            color:#9c8b83;
            font-size:11px;
        "
    >
        LP3I Digital Times — Menuju Kampus Digital 2026
    </div>

</div>


<!-- RESPONSIVE -->

<style>

@media (max-width: 850px) {

    body > div > div:nth-child(2) {
        grid-template-columns:1fr !important;
    }

}

@media (max-width: 600px) {

    body > div {
        padding:20px !important;
    }

    body > div > div:first-child {
        display:block !important;
    }

    body > div > div:first-child a {
        display:inline-block;
        margin-top:15px;
    }

}

</style>

</body>
</html>