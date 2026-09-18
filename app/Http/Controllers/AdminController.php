<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Karya;

class AdminController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function karya()
    {
    $karya = Karya::with('mahasiswa', 'kategori')->get();

    return view('admin.karya.index', compact('karya'));
    }

    public function detailKarya($id)
    {
        $karya = Karya::with('mahasiswa', 'kategori')
            ->where('id_karya', $id)
            ->firstOrFail();

        return view('admin.karya.detail', compact('karya'));
    }

    public function setujuiKarya($id)
    {
        $karya = Karya::where('id_karya', $id)->firstOrFail();

        $karya->update([
            'status' => 'disetujui',
            'catatan' => null,
        ]);

        return redirect()
            ->route('admin.karya.detail', $id)
            ->with('success', 'Karya berhasil disetujui.');
    }

    public function tolakKarya(Request $request, $id)
    {
        $request->validate([
            'catatan' => 'required',
        ]);

        $karya = Karya::where('id_karya', $id)->firstOrFail();

        $karya->update([
            'status' => 'ditolak',
            'catatan' => $request->catatan,
        ]);

        return redirect()
            ->route('admin.karya.detail', $id)
            ->with('success', 'Karya berhasil ditolak.');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}