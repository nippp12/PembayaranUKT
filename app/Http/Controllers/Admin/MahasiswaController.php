<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{

    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('admin.mahasiswa', compact('mahasiswa'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
       // Buat instance baru dari model Mahasiswa
        $mahasiswa = new Mahasiswa;

        // Set nilai atribut sesuai dengan data yang diterima dari request
        $mahasiswa->nama = $request->nama;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->jurusan = $request->jurusan;
        $mahasiswa->prodi = $request->prodi;
        $mahasiswa->periode_masuk = $request->periode_masuk;
        $mahasiswa->golongan_ukt = $request->golongan_ukt;

        // Simpan data mahasiswa ke dalam database
        $mahasiswa->save();

        // Redirect ke halaman daftar mahasiswa dengan pesan sukses
        return redirect()->route('admin.mahasiswa')->with('success', 'Data mahasiswa berhasil ditambahkan.');
        }

    // Fungsi untuk menampilkan form edit data mahasiswa
    public function edit($nim)
    {
        // Ambil data mahasiswa berdasarkan NIM
        $mahasiswa = Mahasiswa::where('nim', $nim)->firstOrFail();
        
        // Tampilkan view form edit dengan data mahasiswa yang akan diubah
        return view('admin.edit', compact('mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update($request->all());
        return redirect()->route('admin.mahasiswa')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return redirect()->route('admin.mahasiswa')->with('success', 'Mahasiswa berhasil dihapus.');
    }
}
