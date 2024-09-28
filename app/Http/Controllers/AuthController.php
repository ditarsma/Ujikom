<?php

// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login'); // Menampilkan form login
    }

// App\Http\Controllers\AuthController.php

public function login(Request $request)
{
    // Validasi input
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Cek kredensial
    if (Auth::attempt($request->only('email', 'password'))) {
        // Mengatur session flash untuk pesan sukses
        return redirect()->route('dashboard')->with('success', 'Anda berhasil login!');
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ]);
}


// App\Http\Controllers\AuthController.php

public function logout(Request $request)
{
    Auth::logout();
    
    // Mengatur session flash untuk pesan sukses
    return redirect('/login')->with('success', 'Anda berhasil logout!');
}
}