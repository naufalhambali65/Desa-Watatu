<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cms.berita.index', [
            'title' => 'Berita',
            'datas' => Berita::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cms.berita.create', [
            'title' => 'Tambah Berita'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'slug' => 'required|unique:beritas',
            'gambar' => 'image|file|max:2048',
            'status' => 'required',
            'body' => 'required'
        ]);

        if ($request->file('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('gambar-berita');
        }

        $validatedData['excerpt'] = str_replace(['<div>', '</div>'], '', Str::limit($request->body, 200, '...'));
        $validatedData['created_by'] = auth()->user()->name;

        Berita::create($validatedData);

        return redirect('/admin/berita')->with('success', 'Berita Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Berita $berita)
    {
        return view('cms.berita.show', [
            'title' => 'Detail Berita',
            'data' => $berita,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita $berita)
    {
        return view('cms.berita.edit', [
            'title' => 'Update Berita',
            'data' => $berita,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berita $berita)
    {
        $rules = [
            'judul' => 'required|max:255',
            'gambar' => 'image|file|max:2048',
            'status' => 'required',
            'body' => 'required'
        ];

        if ($request->slug != $berita->slug) {
            $rules['slug'] = 'required|unique:beritas';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('gambar')) {
            if ($request->oldgambar) {
                Storage::delete($request->oldgambar);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('gambar-berita');
        }

        $validatedData['excerpt'] = str_replace(['<div>', '</div>'], '', Str::limit($request->body, 200, '...'));
        $validatedData['updated_by'] = auth()->user()->name;

        Berita::where('id', $berita->id)->update($validatedData);

        return redirect('/admin/berita')->with('success', 'Berita Berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $berita)
    {
        if ($berita->gambar) {
            Storage::delete($berita->gambar);
        }
        Berita::destroy($berita->id);
        return redirect('/admin/berita')->with('success', 'Berita Berhasil Dihapus!');
    }

    public function createSlug(Request $request)
    {
        $slug = SlugService::createSlug(Berita::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }
}