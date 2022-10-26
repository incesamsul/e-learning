<?php

namespace App\Http\Controllers;


use App\Models\Kategori;
use App\Models\Member;
use App\Models\Pelajaran;
use App\Models\Pengunjung;
use App\Models\PesertaPelajaran;
use App\Models\Pinjam;
use DateTime;
use DateTimeZone;

class Home extends Controller
{

    public function pengunjung()
    {
        return view('halaman_depan.pengunjung');
    }



    public function beranda($idKategori = null)
    {
        if (!$idKategori) {
            $data['pelajaran'] = Pelajaran::all();
        } else {
            $data['pelajaran'] = Pelajaran::where('id_kategori', $idKategori)->get();
        }
        $data['id_kategori'] = $idKategori;
        $data['nama_kategori'] = Kategori::where('id_kategori', $idKategori)->first();
        $data['kategori'] = Kategori::all()->take(5);
        return view('halaman_depan.beranda', $data);
    }

    public function detailPelajaran($idPelajaran = null)
    {

        if (!$idPelajaran) {
            return back();
        } else {
            $data['pelajaran'] = Pelajaran::where('id_pelajaran', $idPelajaran)->first();
        }
        $idMhs = auth()->user() ? auth()->user()->id : 0;
        $data['sudah_daftar'] = PesertaPelajaran::where('id_pelajaran', $idPelajaran)->where('id_mahasiswa', $idMhs)->first();
        return view('halaman_depan.detail_pelajaran', $data);
    }
}
