<?php

namespace App\Http\Controllers;

use App\Models\KatalogUMKM;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class KatalogUMKMController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cms.katalog.index', [
            'title' => 'Katalog UMKM',
            'datas' => KatalogUMKM::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cms.katalog.create', [
            'title' => 'Tambah Katalog UMKM',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_umkm' => 'required|max:255',
            'pemilik' => 'required|max:255',
            'gambar' => 'image|file|max:2048',
            'deskripsi' => 'required',
            'alamat' => 'required|max:255',
            'kategori' => 'required',
        ]);

        if ($request->file('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('gambar-katalog');
        }

        $validatedData['created_by'] = auth()->user()->name;

        KatalogUMKM::create($validatedData);

        return redirect('/admin/katalog')->with('success', 'Katalog Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(KatalogUMKM $katalog)
    {
        return view('cms.katalog.show', [
            'title' => 'Detail Katalog UMKM',
            'data' => $katalog,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KatalogUMKM $katalog)
    {
        return view('cms.katalog.edit', [
            'title' => 'Update Katalog UMKM',
            'data' => $katalog,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KatalogUMKM $katalog)
    {
        $rules = [
            'nama_umkm' => 'required|max:255',
            'pemilik' => 'required|max:255',
            'gambar' => 'image|file|max:2048',
            'deskripsi' => 'required',
            'alamat' => 'required|max:255',
            'kategori' => 'required',
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('gambar')) {
            if ($request->oldgambar) {
                Storage::delete($request->oldgambar);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('gambar-katalog');
        }
        $validatedData['updated_by'] = auth()->user()->name;

        KatalogUMKM::where('id', $katalog->id)->update($validatedData);

        return redirect('/admin/katalog')->with('success', 'Katalog Berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KatalogUMKM $katalog)
    {
        if ($katalog->gambar) {
            Storage::delete($katalog->gambar);
        }
        KatalogUMKM::destroy($katalog->id);
        return redirect('/admin/katalog')->with('success', 'Katalog Berhasil Dihapus!');
    }
}
