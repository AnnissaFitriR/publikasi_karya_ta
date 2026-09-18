<?php

namespace App\Http\Controllers;

use App\Models\Karya;
use App\Models\Kategori;

class HomeController extends Controller
{
    public function index()
    {
        $karya = Karya::with('mahasiswa', 'kategori')
            ->where('status', 'disetujui')
            ->latest()
            ->take(3)
            ->get();

        $kategori = Kategori::all();

        return view('home', compact('karya', 'kategori'));
    }

    public function semuaKarya()
    {
        $karya = Karya::with('mahasiswa', 'kategori')
            ->where('status', 'disetujui')
            ->latest()
            ->get();

        return view('pengunjung.karya.index', compact('karya'));
    }

    public function detailKarya($id)
    {
        $karya = Karya::with('mahasiswa', 'kategori')
            ->where('id_karya', $id)
            ->where('status', 'disetujui')
            ->firstOrFail();

        return view('pengunjung.karya.detail', compact('karya'));
    }

    public function kategori($id)
    {
        $kategori = Kategori::where('id_kategori', $id)->firstOrFail();

        $karya = Karya::with('mahasiswa', 'kategori')
            ->where('id_kategori', $id)
            ->where('status', 'disetujui')
            ->latest()
            ->get();

        return view('pengunjung.karya.kategori', compact('karya', 'kategori'));
    }
}