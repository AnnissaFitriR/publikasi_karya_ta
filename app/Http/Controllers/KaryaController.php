<?php

namespace App\Http\Controllers;

use App\Models\Karya;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KaryaController extends Controller
{
    public function index()
    {
        $karya = Karya::where('id_mahasiswa', Auth::id())->get();

        return view('mahasiswa.karya.index', compact('karya'));
    }

    public function create()
    {
        $kategori = Kategori::all();

        return view('mahasiswa.karya.create', compact('kategori'));
    }

    public function store(Request $request)
    {
    $request->validate([
        'id_kategori' => 'required|exists:kategori,id_kategori',
        'judul' => 'required',
        'deskripsi' => 'required',
        'file_karya' => 'required|file|mimes:jpg,jpeg,png,pdf,doc,docx,zip|max:10240',
    ]);

    $fileKarya = $request->file('file_karya')->store('karya', 'public');

    Karya::create([
        'id_mahasiswa' => Auth::id(),
        'id_kategori' => $request->id_kategori,
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
        'file_karya' => $fileKarya,
        'status' => 'menunggu',
    ]);

    return redirect()
        ->route('mahasiswa.karya.index')
        ->with('success', 'Karya berhasil ditambahkan dan menunggu persetujuan admin.');
    }

    public function edit($id)
{
    $karya = Karya::where('id_karya', $id)
        ->where('id_mahasiswa', Auth::id())
        ->firstOrFail();

    $kategori = Kategori::all();

    return view('mahasiswa.karya.edit', compact('karya', 'kategori'));
}

public function update(Request $request, $id)
{
    $karya = Karya::where('id_karya', $id)
        ->where('id_mahasiswa', Auth::id())
        ->firstOrFail();

    $request->validate([
        'id_kategori' => 'required|exists:kategori,id_kategori',
        'judul' => 'required',
        'deskripsi' => 'required',
    ]);

    $karya->update([
        'id_kategori' => $request->id_kategori,
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
    ]);

    return redirect()
        ->route('mahasiswa.karya.index')
        ->with('success', 'Karya berhasil diperbarui.');
    }

    public function destroy($id)
{
    $karya = Karya::where('id_karya', $id)
        ->where('id_mahasiswa', Auth::id())
        ->firstOrFail();

    $karya->delete();

    return redirect()
        ->route('mahasiswa.karya.index')
        ->with('success', 'Karya berhasil dihapus.');
}
}