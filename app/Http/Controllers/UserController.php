<?php

namespace App\Http\Controllers;

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
}
