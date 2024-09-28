<?php
// app/Http/Controllers/UserDetailController.php

namespace App\Http\Controllers;

use App\Models\Murid;
use Illuminate\Http\Request;

class UserDetailController extends Controller
{
    public function show($id)
    {
        $murid = Murid::findOrFail($id);  // Ambil data murid berdasarkan ID
        return view('detailuser', compact('murid'));  // Kirim data ke view detailuser.blade.php
    }
}


