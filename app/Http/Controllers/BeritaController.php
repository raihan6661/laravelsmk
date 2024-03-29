<?php

namespace App\Http\Controllers;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BeritaController extends Controller
{
    public function index()
    {
        $data = [
            'dataBerita' => Berita::all(),
            'title' => 'Data Berita'
        ];
        return View('berita.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Berita'
        ];
        return View('berita.tambah', $data);

    }

    public function store(Request $request)
    {
        try {
            $berita = new Berita();
            $berita->judul = $request->judul;
            $berita->isi = $request->isi;
            $berita->save();

            $request->session()->flash('msg', "Data Berita dengan judul `$berita->judul` berhasil disimpan");
            return redirect('/olah-berita');
        } catch (\Throwable $th) {
            echo $th;
        }

    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $berita = Berita::find($id);
        $data = [
            'id' => $berita->id,
            'judul' => $berita->judul,
            'isi' => $berita->isi,
            'title' => 'Ubah Berita'
        ];
        return View('berita.ubah', $data);

    }

    public function update(Request $request, string $id)
    {
        try {
            $berita = Berita::find($id);
            $berita->judul = $request->judul;
            $berita->isi = $request->isi;
            $berita->save();

            $request->session()->flash('msg', "Data Berita dengan judul `$berita->judul` berhasil diupdate");
            return redirect('/olah-berita');
        } catch (\Throwable $th) {
            echo $th;
        }

    }
    
    public function destroy(string $id)
    {
        $mhs = Berita::find($id)->delete();
        return redirect('/olah-berita');
    }
}

