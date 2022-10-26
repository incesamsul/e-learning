<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\SoalPG;
use Illuminate\Http\Request;

class SoalPGController extends Controller
{


    public function store(Request $request)
    {
        SoalPG::create([
            'id_pelajaran' => $request->pelajaran,
            'judul_quiz' => $request->judul,
            'waktu_pengerjaan' => $request->waktu_pengerjaan,
        ]);
        return redirect()->back()->with('message', 'data Berhasil di tambahkan');
    }

    public function update(Request $request)
    {
        $user = SoalPG::where([
            ['id_quiz', '=', $request->id]
        ])->update([
            'id_pelajaran' => $request->pelajaran,
            'judul_quiz' => $request->judul,
            'waktu_pengerjaan' => $request->waktu_pengerjaan,
        ]);
        return redirect()->back()->with('message', 'data Berhasil di update');
    }

    public function delete($idQuiz)
    {
        SoalPG::where('id_quiz', $idQuiz)->delete();
        return redirect()->back()->with('message', 'Berhsil menghapus quiz');
    }
}
