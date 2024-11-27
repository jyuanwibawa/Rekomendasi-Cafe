<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Menampilkan halaman dashboard admin.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Menampilkan halaman dashboard admin
        return view('admin.dashboard');  // Mengarahkan ke view 'admin.dashboard.blade.php'
    }
}
