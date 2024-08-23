<?php

namespace App\Http\Controllers;

use App\Models\DataPenduduk;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DataPendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = DataPenduduk::all();
        $dataUsia = [0, 0, 0, 0, 0];
        $dataAgama = [
            $datas->where('agama', 'ISLAM')->count(),
            $datas->where('agama', 'KRISTEN')->count(),
            $datas->where('agama', 'KATHOLIK')->count(),
            $datas->where('agama', 'BUDDHA')->count(),
            $datas->where('agama', 'KONGHUCU')->count()
        ];
        $dataAlamatSekarang = [
            $datas->where('alamat_sekarang', 'DUSUN I')->count(),
            $datas->where('alamat_sekarang', 'DUSUN II')->count(),
            $datas->where('alamat_sekarang', 'DUSUN III')->count(),
            $datas->where('alamat_sekarang', 'DUSUN IV')->count(),
            $datas->where('alamat_sekarang', 'DUSUN V')->count()
        ];
        $dataAlamatKTP = [
            $datas->where('alamat_ktp', 'DUSUN I')->count(),
            $datas->where('alamat_ktp', 'DUSUN II')->count(),
            $datas->where('alamat_ktp', 'DUSUN III')->count(),
            $datas->where('alamat_ktp', 'DUSUN IV')->count(),
            $datas->where('alamat_ktp', 'DUSUN V')->count()
        ];




        foreach ($datas as $data) {
            $tanggalLahir = Carbon::createFromFormat('d/m/Y', $data['tanggal_lahir']);
            $usia = $tanggalLahir->age;
            $data->usia = $usia;

            if ($usia >= 0 && $usia <= 3) {
                $dataUsia[0]++;
            } else if ($usia >= 4 && $usia <= 5) {
                $dataUsia[1]++;
            } else if ($usia >= 6 && $usia <= 17) {
                $dataUsia[2]++;
            } else if ($usia >= 18 && $usia <= 64) {
                $dataUsia[3]++;
            } else if ($usia >= 65) {
                $dataUsia[4]++;
            }
        }

        return view('cms.dataPenduduk.index', [
            'title' => 'Data Kependudukan',
            'datas' => $datas,
            'dataUsia' => $dataUsia,
            'dataAgama' => $dataAgama,
            'dataDusun' => [
                $dataAlamatSekarang,
                $dataAlamatKTP
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cms.dataPenduduk.create', [
            'title' => 'Tambah Data Penduduk'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['tanggal_lahir'] = Carbon::parse($request['tanggal_lahir'])->format('d/m/Y');
        $validatedData = $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'status_perkawinan' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'pendidikan_terakhir' => 'required',
            'pekerjaan' => 'required',
            'kewarganegaraan' => 'required',
            'alamat_sekarang' => 'required',
            'alamat_ktp' => 'required',
            'status_hubungan_keluarga' => 'required',
            'nik' => 'required',
            'no_kk' => 'required'
        ]);

        DataPenduduk::create($validatedData);

        return redirect('/admin/dataPenduduk')->with('success', 'Data Penduduk Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(DataPenduduk $dataPenduduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataPenduduk $dataPenduduk)
    {
        return view('cms.dataPenduduk.edit', [
            'title' => 'Update Data Penduduk',
            'data' => $dataPenduduk
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataPenduduk $dataPenduduk)
    {
        $request['tanggal_lahir'] = Carbon::parse($request['tanggal_lahir'])->format('d/m/Y');
        $validatedData = $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'status_perkawinan' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'pendidikan_terakhir' => 'required',
            'pekerjaan' => 'required',
            'kewarganegaraan' => 'required',
            'alamat_sekarang' => 'required',
            'alamat_ktp' => 'required',
            'status_hubungan_keluarga' => 'required',
            'nik' => 'required',
            'no_kk' => 'required'
        ]);

        DataPenduduk::where('id', $dataPenduduk->id)->update($validatedData);

        return redirect('/admin/dataPenduduk')->with('success', 'Data Penduduk Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataPenduduk $dataPenduduk)
    {
        DataPenduduk::destroy($dataPenduduk->id);
        return redirect('/admin/dataPenduduk')->with('success', 'Data Penduduk dengan NIK ' . $dataPenduduk->nik . ' Berhasil Dihapus!');
    }
}