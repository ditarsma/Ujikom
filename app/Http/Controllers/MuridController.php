<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MuridController extends Controller
{
    // Menampilkan daftar murid
    public function index()
    {
        $murid = Murid::all();
        return view('murid.index', compact('murid'));
    }

    // Menampilkan form create
    public function create()
    {
        return view('murid.create');
    }
    public function dashboard()
{
    $murids = Murid::all();  // Ambil semua data murid
    return view('dashboard', compact('murids'));  // Kirim data murid ke view dashboard
}


    // Menyimpan data murid baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'kelas' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        // Simpan foto jika ada
        if ($request->hasFile('foto')) {
            // Simpan file foto ke storage folder public/foto_murid
            $data['foto'] = $request->file('foto')->store('foto_murid', 'public');
        }

        Murid::create($data);

        return redirect()->route('murid.index')->with('success', 'Murid berhasil ditambahkan.');
    }

    // Menampilkan detail murid
    public function show($id)
    {
        $murid = Murid::findOrFail($id);
        return view('murid.show', compact('murid'));
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $murid = Murid::findOrFail($id);
        return view('murid.edit', compact('murid'));
    }

    // Mengupdate data murid
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'kelas' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $murid = Murid::findOrFail($id);
        $data = $request->all();

        // Jika ada file foto baru yang diupload
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($murid->foto && Storage::disk('public')->exists($murid->foto)) {
                Storage::disk('public')->delete($murid->foto);
            }

            // Simpan foto baru
            $data['foto'] = $request->file('foto')->store('foto_murid', 'public');
        }

        $murid->update($data);

        return redirect()->route('murid.index')->with('success', 'Murid berhasil diupdate.');
    }

    // Menghapus data murid
    public function destroy($id)
    {
        $murid = Murid::findOrFail($id);

        // Hapus foto dari storage jika ada
        if ($murid->foto && Storage::disk('public')->exists($murid->foto)) {
            Storage::disk('public')->delete($murid->foto);
        }

        $murid->delete();

        return redirect()->route('murid.index')->with('success', 'Murid berhasil dihapus.');
    }
}
