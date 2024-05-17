<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        // $bukti = $request->file('bukti');
        // $fileName = $bukti->getClientOriginalName();

        // $path = $bukti->storeAs(
        //     'bukti', $fileName, 'public'
        // );

        $bukti = $request->file('bukti');
        $fileName = time() . '_' . $bukti->getClientOriginalName();
    
        $path = $bukti->storeAs('bukti', $fileName, 'public');
        Mahasiswa::create([
            'user_id' => auth()->user()->id,
            'jurusan' => $request->jurusan,
            'prodi' => $request->prodi,
            'semester' => $request->semester,
            'golongan_ukt' => $request->golongan,
            'bukti' => $fileName
        ]);

        return redirect()->route('riwayat');
    }
}