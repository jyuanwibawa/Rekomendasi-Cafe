<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Agenda;
use App\Models\Mood;
use App\Models\Cafe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function indexregister()
    {
        return view('auth.register');
    }

    public function dashboard()
    {
        $user = session('user');

        if (!$user) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        $agendas = Agenda::all();
        $moods = Mood::all();
        $cafes = Cafe::all();
        return view('dashboard', compact('agendas', 'moods', 'cafes'));
    }

    public function dashboardadmin()
    {
        $user = session('user');

        if (!$user) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        if ($user->role !== 'admin') {
            return redirect()->route('dashboard')->with('error', 'Akses ditolak. Hanya admin yang dapat mengakses halaman ini.');
        }

        return view('admin.dashboard');
    }

    public function register(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'password' => Hash::make($request->password),  // Hash password before storing
        ]);

        return redirect('/login')->with('success', 'Akun Anda berhasil dibuat. Silahkan login.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Set session untuk user
            session(['user' => $user]);

            if ($user->role === 'admin') {
                return redirect('/admin-dashboard')->with('success', 'Selamat datang di dashboard admin.');
            }

            return redirect('/dashboard')->with('success', 'Selamat datang.');
        }

        return back()->with('error', 'Username atau password salah.');
    }

    public function logout()
    {
        session()->flush();
        Log::info('User telah logout dan session telah dihapus.');
        return redirect('/login')->with('success', 'Anda berhasil logout.');
    }

    public function profile()
    {
        $user = session('user');

        if (!$user) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        return view('auth.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = session('user');

        if (!$user) {
            return redirect('/login')->with('error', 'Anda perlu login terlebih dahulu.');
        }

        // Validasi input
        $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user['id'],
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        // Periksa apakah password lama valid
        if ($request->has('old_password') && !empty($request->old_password)) {
            if (!Hash::check($request->old_password, $user['password'])) {
                return back()->with('error', 'Password lama salah.');
            }
        }

        // Update kolom fullname dan username
        $user->fullname = $request->input('fullname');
        $user->username = $request->input('username');

        // Jika password baru disertakan dan valid, hash dan update password
        if ($request->has('password') && !empty($request->password)) {
            $user->password = Hash::make($request->password);
        }

        // Simpan perubahan ke database
        $user->save();

        // Redirect kembali ke halaman profil dengan pesan sukses
        return redirect()->route('profile.show')->with('success', 'Profil Anda berhasil diperbarui.');
    }

    
}
