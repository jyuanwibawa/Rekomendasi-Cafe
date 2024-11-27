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
        $agendas = Agenda::all();
        $moods = Mood::all();
        $cafes = Cafe::all();
        return view('dashboard', compact('agendas', 'moods', 'cafes'));
    }

    public function dashboardadmin()
    {
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
            'password' => $request->password,
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
    
        Log::info('Login Attempt for Username: ' . $request->username);
    
        if ($user && Hash::check($request->password, $user->password)) {
            session(['user' => $user]);
    
            Log::info('Login berhasil untuk Username: ' . $user->username);
    
            if ($user->role === 'admin') {
                Log::info('Admin login, mengarahkan ke admin.dashboard');
                return redirect('/admin-dashboard')->with('success', 'Selamat datang di dashboard admin, ' . $user->fullname);
            }
    
            return redirect('/dashboard')->with('success', 'Selamat datang, ' . $user->fullname);
        }
    
        Log::error('Username atau password salah: ' . $request->username);
        return back()->with('error', 'Username atau password salah.');
    }

    public function logout()
    {
        session()->flush();
        Log::info('User telah logout dan session telah dihapus.');
        return redirect('/login')->with('success', 'Anda berhasil logout.');
    }
    

}
