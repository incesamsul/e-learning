<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pelajaran;
use App\Models\PesertaPelajaran;
use Illuminate\Http\Request;

class PesertaPelajaranController extends Controller
{

    public function store(Request $request)
    {
        PesertaPelajaran::create([
            'id_mahasiswa' => auth()->user()->id,
            'id_pelajaran' => $request->pelajaran,
            'status' => 'pending'
        ]);

        return redirect()->back()->with('message', 'Berhsil mendaftar, tunggu konfirmasi yah');
    }
}
