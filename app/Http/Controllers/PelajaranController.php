<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pelajaran;
use Illuminate\Http\Request;

class PelajaranController extends Controller
{
    public function index()
    {
        $data['headerTitle'] = 'Pelajaran';
        $data['headerSubTitle'] = 'Selamat Datang | Aplikasi e-learning';
        $data['pelajaran'] = Pelajaran::where('id_dosen', auth()->user()->id)->get();
        $data['kategori'] = Kategori::where('id_dosen', auth()->user()->id)->get();
        return view('pages.pelajaran.index', $data);
    }
    public function store(Request $request)
    {
        $gambar = $request->file('gambar');
        $namaFile = uniqid() . '.jpg';
        $gambar->move(public_path('data/gambar_sampul/'), $namaFile);
        Pelajaran::create([
            'nama_pelajaran' => $request->nama_pelajaran,
            'deskripsi' => $request->deskripsi,
            'id_dosen' => auth()->user()->id,
            'id_kategori' => $request->kategori,
            'gambar' => $namaFile,
        ]);
        return redirect()->back()->with('message', 'data Berhasil di tambahkan');
    }

    public function update(Request $request)
    {

        $gambar = $request->file('gambar');
        if ($gambar) {
            $namaFile = uniqid() . '.jpg';
            $gambar->move(public_path('data/gambar_sampul/'), $namaFile);
            Pelajaran::where([
                ['id_pelajaran', '=', $request->id]
            ])->update([
                'nama_pelajaran' => $request->nama_pelajaran,
                'deskripsi' => $request->deskripsi,
                'id_kategori' => $request->kategori,
                'gambar' => $namaFile,
            ]);
        } else {
            Pelajaran::where([
                ['id_pelajaran', '=', $request->id]
            ])->update([
                'nama_pelajaran' => $request->nama_pelajaran,
                'deskripsi' => $request->deskripsi,
                'id_kategori' => $request->kategori,
            ]);
        }
        return redirect()->back()->with('message', 'data Berhasil di update');
    }

    public function delete(Request $request)
    {
        $user = Pelajaran::where([
            ['id_pelajaran', '=', $request->id]
        ])->delete();
        return 1;
    }
}
