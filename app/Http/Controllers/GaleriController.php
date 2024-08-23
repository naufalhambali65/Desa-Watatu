<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cms.galeri.index', [
            'title' => 'Galeri',
            'datas' => Galeri::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cms.galeri.create', [
            'title' => 'Tambah Galeri',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'status' => 'required',
            'gambar' => 'image|file|max:3000',
        ]);

        if ($request->file('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('gambar-galeri');
        }

        $validatedData['created_by'] = auth()->user()->name;

        Galeri::create($validatedData);

        return redirect('/admin/galeri')->with('success', 'Gambar Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Galeri $galeri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Galeri $galeri)
    {
        return view('cms.galeri.edit', [
            'title' => 'Edit Galeri',
            'data' => $galeri,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Galeri $galeri)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'status' => 'required',
            'gambar' => 'image|file|max:3000',
        ]);

        if ($request->file('gambar')) {
            if ($request->oldgambar) {
                Storage::delete($request->oldgambar);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('gambar-galeri');
        }

        $validatedData['updated_by'] = auth()->user()->name;

        Galeri::where('id', $galeri->id)->update($validatedData);

        return redirect('/admin/galeri')->with('success', 'Gambar Berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galeri $galeri)
    {
        if ($galeri->gambar) {
            Storage::delete($galeri->gambar);
        }
        Galeri::destroy($galeri->id);
        return redirect('/admin/galeri')->with('success', 'Gambar Berhasil Dihapus!');
    }
}
