<?php

namespace App\Http\Controllers;

use App\Models\MateriTertulis;
use App\Models\MateriVideo;
use App\Models\Pelajaran;
use App\Models\PesertaPelajaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;


class DosenController extends Controller
{

    public function peserta()
    {
        $data['pelajaran'] = PesertaPelajaran::all();
        return view('pages.peserta.index', $data);
    }

    public function pesertaPelajaran()
    {
        $data['pelajaran'] = PesertaPelajaran::all();
        return view('pages.peserta.peserta', $data);
    }

    public function materiVideo()
    {
        $data['liClass'] = 'liMateriVideo';
        $data['data_materi'] = 'data_materi_video';
        $data['pelajaran'] = Pelajaran::where('id_dosen', auth()->user()->id)->get();
        return view('pages.materi.index', $data);
    }

    public function materiTertulis()
    {
        $data['liClass'] = 'liMateriTertulis';
        $data['data_materi'] = 'data_materi_tertulis';
        $data['pelajaran'] = Pelajaran::where('id_dosen', auth()->user()->id)->get();
        return view('pages.materi.index', $data);
    }

    public function dataMateriVideo($idPelajaran)
    {
        $data['id_pelajaran'] = $idPelajaran;
        $data['pages'] = 'materi_video';
        $data['liClass'] = 'liMateriVideo';
        $data['data_materi'] = 'data_materi_video';
        $data['video'] = MateriVideo::where('id_pelajaran', $idPelajaran)->get();
        return view('pages.materi.materi_video', $data);
    }

    public function dataMateriTertulis($idPelajaran)
    {
        $data['id_pelajaran'] = $idPelajaran;
        $data['pages'] = 'materi_tertulis';
        $data['liClass'] = 'liMateriTertulis';
        $data['data_materi'] = 'data_materi_tertulis';
        $data['materi'] = MateriTertulis::where('id_pelajaran', $idPelajaran)->get();
        return view('pages.materi.materi_tertulis', $data);
    }

    public function terimaPeserta($idPesertaPelajaran)
    {
        $peserta = PesertaPelajaran::where('id_peserta_pelajaran', $idPesertaPelajaran);
        $peserta->update([
            'status' => 'diterima'
        ]);
        return redirect()->back()->with('message', 'berhasil di terima');
    }

    public function batalkanPeserta($idPesertaPelajaran)
    {
        $peserta = PesertaPelajaran::where('id_peserta_pelajaran', $idPesertaPelajaran);
        $peserta->update([
            'status' => 'pending'
        ]);
        return redirect()->back()->with('message', 'berhasil di pending');
    }

    public function tolakPeserta($idPesertaPelajaran)
    {
        $peserta = PesertaPelajaran::where('id_peserta_pelajaran', $idPesertaPelajaran);
        $peserta->update([
            'status' => 'ditolak'
        ]);
        return redirect()->back()->with('message', 'berhasil di tolak');
    }
}
