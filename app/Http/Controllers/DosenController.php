<?php

namespace App\Http\Controllers;

use App\Models\MateriTertulis;
use App\Models\MateriVideo;
use App\Models\Pelajaran;
use App\Models\PesertaPelajaran;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;


class DosenController extends Controller
{

    public function peserta()
    {
        $data['pelajaran'] = Pelajaran::where('id_dosen', auth()->user()->id)->get();
        return view('pages.peserta.index', $data);
    }

    public function pesertaPelajaran($idPelajaran)
    {
        $data['pelajaran'] = PesertaPelajaran::where('id_pelajaran', $idPelajaran)->get();
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

    public function quiz()
    {
        $data['liClass'] = 'liQuiz';
        $data['headerTitle'] = 'quiz';
        $data['headerSubTitle'] = 'Selamat Datang | Aplikasi e-learning';
        $data['pelajaran'] = Pelajaran::where('id_dosen', auth()->user()->id)->get();
        return view('pages.quiz.index', $data);
    }

    public function dataQuiz($idPelajaran)
    {
        $data['id_pelajaran'] = $idPelajaran;
        $data['pages'] = 'data_quiz';
        $data['liClass'] = 'liQuiz';
        $data['data_materi'] = 'data_data_quiz';
        $data['quiz'] = Quiz::where('id_pelajaran', $idPelajaran)->get();
        return view('pages.quiz.data_quiz', $data);
    }

    public function soal($idQuiz)
    {
        $data['id_quiz'] = $idQuiz;
        $data['pages'] = 'data_soal';
        $data['liClass'] = 'liQuiz';
        $data['data_materi'] = 'data_data_quiz';
        $data['quiz'] = Quiz::where('id_pelajaran', $idQuiz)->get();
        return view('pages.quiz.data_soal', $data);
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
