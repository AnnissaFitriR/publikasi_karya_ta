<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    public function showRegister()
    {
        return view('mahasiswa.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nipd' => 'required|unique:mahasiswa,nipd',
            'nama' => 'required',
            'program_studi' => 'required',
            'email' => 'required|email|unique:mahasiswa,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $mahasiswa = Mahasiswa::create([
            'nipd' => $request->nipd,
            'nama' => $request->nama,
            'program_studi' => $request->program_studi,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('web')->login($mahasiswa);

        return redirect()->route('mahasiswa.dashboard');
    }

    public function showLogin()
    {
        return view('mahasiswa.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('mahasiswa.dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function profile()
    {
        $mahasiswa = Auth::user();

        return view('mahasiswa.profile', compact('mahasiswa'));
    }

    public function updateProfile(Request $request)
    {
    $mahasiswa = Auth::user();

    $request->validate([
        'nama' => 'required',
        'program_studi' => 'required',
        'email' => 'required|email|unique:mahasiswa,email,' . $mahasiswa->id_mahasiswa . ',id_mahasiswa',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $mahasiswa->nama = $request->nama;
    $mahasiswa->program_studi = $request->program_studi;
    $mahasiswa->email = $request->email;

    if ($request->hasFile('foto')) {
        if ($mahasiswa->foto) {
            Storage::disk('public')->delete($mahasiswa->foto);
        }

        $mahasiswa->foto = $request->file('foto')->store('mahasiswa', 'public');
    }

    $mahasiswa->save();

    return redirect()
        ->route('mahasiswa.profile')
        ->with('success', 'Profil berhasil diperbarui.');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}