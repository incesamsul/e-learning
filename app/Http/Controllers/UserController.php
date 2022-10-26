<?php

namespace App\Http\Controllers;

use App\Models\MateriTertulis;
use App\Models\MateriVideo;
use App\Models\Pelajaran;
use App\Models\PesertaPelajaran;
use App\Models\Pinjam;
use DateTime;
use DateTimeZone;

class UserController extends Controller
{

    public function myAccount()
    {
        return view('halaman_depan.my_account');
    }

    public function pelajaranTerdaftar()
    {
        $data['pelajaran'] = PesertaPelajaran::where('id_mahasiswa', auth()->user()->id)->where('status', 'pending')->get();
        return view('halaman_depan.pelajaran_terdaftar', $data);
    }

    public function pelajaranSaya()
    {
        $data['pelajaran'] = PesertaPelajaran::where('id_mahasiswa', auth()->user()->id)->where('status', 'diterima')->get();
        return view('halaman_depan.pelajaran_terdaftar', $data);
    }

    public function materi($idPelajaran)
    {
        $data['pelajaran'] = Pelajaran::where('id_pelajaran', $idPelajaran)->first();
        return view('halaman_depan.materi', $data);
    }

    public function materiVideo($idPelajaran)
    {
        $data['pelajaran'] = Pelajaran::where('id_pelajaran', $idPelajaran)->first();
        $data['video'] = MateriVideo::where('id_pelajaran', $idPelajaran)->get();
        return view('halaman_depan.materi_video', $data);
    }

    public function materiTertulis($idPelajaran)
    {
        $data['pelajaran'] = Pelajaran::where('id_pelajaran', $idPelajaran)->first();
        $data['materi'] = MateriTertulis::where('id_pelajaran', $idPelajaran)->get();
        return view('halaman_depan.materi_tertulis', $data);
    }

    public function virtualCoding($idPelajaran)
    {
        $data['id_pelajaran'] = $idPelajaran;
        $data['pelajaran'] = Pelajaran::where('id_pelajaran', $idPelajaran)->first();
        $data['materi'] = MateriTertulis::where('id_pelajaran', $idPelajaran)->get();
        return view('halaman_depan.virtual_coding', $data);
    }

    public function quiz($idPelajaran)
    {
        $data['pelajaran'] = Pelajaran::where('id_pelajaran', $idPelajaran)->first();
        $data['materi'] = MateriTertulis::where('id_pelajaran', $idPelajaran)->get();
        return view('halaman_depan.quiz', $data);
    }
}
