<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $data['headerTitle'] = 'Kategori';
        $data['headerSubTitle'] = 'Selamat Datang | Aplikasi e-learning';
        $data['kategori'] = Kategori::where('id_dosen', auth()->user()->id)->get();
        return view('pages.kategori.index', $data);
    }

    public function store(Request $request)
    {
        Kategori::create([
            'id_dosen' => auth()->user()->id,
            'nama_kategori' => $request->nama_kategori,
        ]);
        return redirect()->back()->with('message', 'data Berhasil di tambahkan');
    }

    public function update(Request $request)
    {
        $user = Kategori::where([
            ['id_kategori', '=', $request->id]
        ])->update([
            'nama_kategori' => $request->nama_kategori,
        ]);
        return redirect()->back()->with('message', 'data Berhasil di update');
    }

    public function delete(Request $request)
    {
        $user = Kategori::where([
            ['id_kategori', '=', $request->id]
        ])->delete();
        return 1;
    }
}
