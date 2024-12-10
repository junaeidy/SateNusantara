<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $credentials['email'])->first();
        
        if ($user && $user->email == 'admin@admin.com' && password_verify($credentials['password'], $user->password)) {
            Auth::login($user);

            // Menampilkan notifikasi sukses
            Flasher::addSuccess('Login berhasil!');

            return redirect()->route('admin.dashboard');
        }

        // Menampilkan notifikasi error jika login gagal
        Flasher::addError('Email atau password salah');

        return back()->withErrors(['email' => 'Invalid credentials']);
    }


    public function logout()
    {
        Auth::logout();
        Flasher::addInfo('Logout berhasil!');
        return redirect('/admin/login');

    }
}
