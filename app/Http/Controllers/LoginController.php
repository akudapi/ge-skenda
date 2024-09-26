<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\password;

class LoginController extends Controller
{
    public function login_proses(Request $request)
    {
        // Validasi input
        $request->validate([
            'username'  => 'required',
            'password'  => 'required',
        ]);

        // Coba autentikasi user
        $credentials = $request->only('username', 'password');

        // Jika login berhasil
        if (Auth::attempt($credentials)) {
            // Mengarahkan kembali ke halaman yang dicoba diakses sebelum login, atau ke dashboard
            return redirect()->back();
        }

        // Jika login gagal, kembalikan dengan pesan error
        return back()->with('loginError', 'Login gagal, periksa username atau password Anda.');
    }

    public function logout(){
        Auth::logout();
        return redirect()->back();
    }
}
