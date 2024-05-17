<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index(Request $request){
        // return view('admin.pembayaran');
        // $mahasiswa = Mahasiswa::with('user')->get();
        // return view('admin.pembayaran', compact('mahasiswa'));
        $search = $request->input('search');

        $mahasiswa = Mahasiswa::with('user')
        ->whereHas('user', function($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('nim', 'like', "%{$search}%");
        })
        ->orWhere('semester', 'like', "%{$search}%")
        ->get();
        // $mahasiswa = Mahasiswa::with('user')->get();
        return view('admin.pembayaran', compact('mahasiswa'));
    }

    public function updateStatus(Request $request)
    {
        $mahasiswa = Mahasiswa::where('id', $request->id)->first();
        
        $mahasiswa->update([
            'status' => $request->status
        ]);

        return redirect()->back();
    }
}
