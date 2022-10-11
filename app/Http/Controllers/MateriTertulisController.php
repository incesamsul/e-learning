<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\MateriTertulis;
use App\Models\MateriVideo;
use App\Models\Pelajaran;
use App\Models\PesertaPelajaran;
use Illuminate\Http\Request;

class MateriTertulisController extends Controller
{

    public function store(Request $request)
    {
        $materi = $request->materi;
        $fileName = uniqid() . '.pdf';

        $materi->move(public_path('data/materi_tertulis/'), $fileName);
        MateriTertulis::create([
            'id_pelajaran' => $request->pelajaran,
            'judul_materi' => $request->judul_materi,
            'deskripsi_materi' => $request->deskripsi_materi,
            'materi' => $fileName,
        ]);

        return redirect()->back()->with('message', 'Berhsil menyimpan materi');
    }
    public function delete($idMateriTertulis)
    {
        MateriTertulis::where('id_materi_tertulis', $idMateriTertulis)->delete();
        return redirect()->back()->with('message', 'Berhsil menghapus materi');
    }
}
