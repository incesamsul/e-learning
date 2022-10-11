<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\MateriVideo;
use App\Models\Pelajaran;
use App\Models\PesertaPelajaran;
use Illuminate\Http\Request;

class MateriVideoController extends Controller
{

    public function store(Request $request)
    {
        MateriVideo::create([
            'id_pelajaran' => $request->pelajaran,
            'judul_video' => $request->judul_video,
            'deskripsi_video' => $request->deskripsi_video,
            'video' => $request->video,
        ]);

        return redirect()->back()->with('message', 'Berhsil menyimpan video');
    }
    public function delete($idMateriVideo)
    {
        MateriVideo::where('id_materi_video', $idMateriVideo)->delete();
        return redirect()->back()->with('message', 'Berhsil menghapus video');
    }
}
