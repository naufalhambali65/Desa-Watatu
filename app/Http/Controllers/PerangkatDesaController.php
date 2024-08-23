<?php

namespace App\Http\Controllers;

use App\Models\PerangkatDesa;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PerangkatDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cms.perangkatDesa.index', [
            'title' => 'Perangkat',
            'datas' => PerangkatDesa::orderBy('jabatan', 'asc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cms.perangkatDesa.create', [
            'title' => 'Tambah Perangkat'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'nip' => 'max:255',
            'gambar' => 'required|image|file|max:2048',
            'jabatan' => 'required|max:255|unique:perangkat_desas',
            'instagram' => 'max:255',
            'facebook' => 'max:255',
            'whatsapp' => 'max:255'
        ]);

        if ($request->file('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('gambar-aparat-desa');
        }

        // $validatedData['created_by'] = auth()->user()->username;

        PerangkatDesa::create($validatedData);

        return redirect('/admin/perangkatDesa')->with('success', 'Perangkat Desa Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PerangkatDesa $perangkatDesa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PerangkatDesa $perangkatDesa)
    {
        return view('cms.perangkatDesa.edit', [
            'title' => 'Edit Perangkat Desa',
            'data' => $perangkatDesa
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PerangkatDesa $perangkatDesa)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'nip' => 'max:255',
            'gambar' => 'image|file|max:2048',
            'instagram' => 'max:255',
            'facebook' => 'max:255',
            'whatsapp' => 'max:255'
        ]);

        if ($request->jabatan != $perangkatDesa->jabatan) {
            $rules['jabatan'] = 'required|max:255|unique:perangkat_desas';
        }

        if ($request->file('gambar')) {
            if ($request->oldgambar) {
                Storage::delete($request->oldgambar);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('gambar-aparat-desa');
        }
        PerangkatDesa::where('id', $perangkatDesa->id)->update($validatedData);

        return redirect('/admin/perangkatDesa')->with('success', 'Perangkat Desa Berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PerangkatDesa $perangkatDesa)
    {
        if ($perangkatDesa->gambar) {
            Storage::delete($perangkatDesa->gambar);
        }
        PerangkatDesa::destroy($perangkatDesa->id);
        return redirect('/admin/perangkatDesa')->with('success', 'Perangkat Desa Berhasil Dihapus!');
    }
}
