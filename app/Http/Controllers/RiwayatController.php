<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index(){
        $mhs = Mahasiswa::where('user_id', auth()->user()->id)->get();

        return view('riwayat', [
            'mhs' => $mhs
        ]);
    }
}
