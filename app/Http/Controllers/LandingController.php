<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\DataPenduduk;
use App\Models\KatalogUMKM;
use App\Models\PerangkatDesa;

class LandingController extends Controller
{
    public function index()
    {
        $dataPenduduk = [
            'jumlah' => DataPenduduk::all()->count(),
            'kepalaKeluarga' => DataPenduduk::where('status_hubungan_keluarga', 'KEPALA KELUARGA')->count(),
            'laki-laki' => DataPenduduk::where('jenis_kelamin', 'LAKI-LAKI')->count(),
            'perempuan' => DataPenduduk::where('jenis_kelamin', 'PEREMPUAN')->count(),
        ];

        $datas = DataPenduduk::all();
        $dusun1 = [
            'jumlah' => $datas->where('alamat_sekarang', 'DUSUN I')->count(),
            'kepalaKeluarga' => $datas->where('alamat_sekarang', 'DUSUN I')->where('status_hubungan_keluarga', 'KEPALA KELUARGA')->count(),
            'laki-laki' => $datas->where('alamat_sekarang', 'DUSUN I')->where('jenis_kelamin', 'LAKI-LAKI')->count(),
            'perempuan' => $datas->where('alamat_sekarang', 'DUSUN I')->where('jenis_kelamin', 'PEREMPUAN')->count(),
        ];
        $dusun2 = [
            'jumlah' => $datas->where('alamat_sekarang', 'DUSUN II')->count(),
            'kepalaKeluarga' => $datas->where('alamat_sekarang', 'DUSUN II')->where('status_hubungan_keluarga', 'KEPALA KELUARGA')->count(),
            'laki-laki' => $datas->where('alamat_sekarang', 'DUSUN II')->where('jenis_kelamin', 'LAKI-LAKI')->count(),
            'perempuan' => $datas->where('alamat_sekarang', 'DUSUN II')->where('jenis_kelamin', 'PEREMPUAN')->count(),
        ];
        $dusun3 = [
            'jumlah' => $datas->where('alamat_sekarang', 'DUSUN III')->count(),
            'kepalaKeluarga' => $datas->where('alamat_sekarang', 'DUSUN III')->where('status_hubungan_keluarga', 'KEPALA KELUARGA')->count(),
            'laki-laki' => $datas->where('alamat_sekarang', 'DUSUN III')->where('jenis_kelamin', 'LAKI-LAKI')->count(),
            'perempuan' => $datas->where('alamat_sekarang', 'DUSUN III')->where('jenis_kelamin', 'PEREMPUAN')->count(),
        ];
        $dusun4 = [
            'jumlah' => $datas->where('alamat_sekarang', 'DUSUN IV')->count(),
            'kepalaKeluarga' => $datas->where('alamat_sekarang', 'DUSUN IV')->where('status_hubungan_keluarga', 'KEPALA KELUARGA')->count(),
            'laki-laki' => $datas->where('alamat_sekarang', 'DUSUN IV')->where('jenis_kelamin', 'LAKI-LAKI')->count(),
            'perempuan' => $datas->where('alamat_sekarang', 'DUSUN IV')->where('jenis_kelamin', 'PEREMPUAN')->count(),
        ];
        $dusun5 = [
            'jumlah' => $datas->where('alamat_sekarang', 'DUSUN V')->count(),
            'kepalaKeluarga' => $datas->where('alamat_sekarang', 'DUSUN V')->where('status_hubungan_keluarga', 'KEPALA KELUARGA')->count(),
            'laki-laki' => $datas->where('alamat_sekarang', 'DUSUN V')->where('jenis_kelamin', 'LAKI-LAKI')->count(),
            'perempuan' => $datas->where('alamat_sekarang', 'DUSUN V')->where('jenis_kelamin', 'PEREMPUAN')->count(),
        ];

        return view('landing.index', [
            'dataBerita' => Berita::where('status', 'Public')->latest()->limit(5)->get(),
            'dataPenduduk' => $dataPenduduk,
            'dusun1' => $dusun1,
            'dusun2' => $dusun2,
            'dusun3' => $dusun3,
            'dusun4' => $dusun4,
            'dusun5' => $dusun5,
            'dataKatalog' => KatalogUMKM::all(),
            'perangkatDesa' => PerangkatDesa::OrderBy('jabatan', 'asc')->limit(4)->get()
        ]);
    }

    public function berita()
    {
        return view('landing.berita.index', [
            'dataBerita' => Berita::where('status', 'Public')->latest()->paginate(12),
        ]);
    }

    public function detailBerita(Berita $berita)
    {
        return view('landing.berita.show', [
            'data' => $berita,
            'dataBerita' => Berita::where('status', 'Public')->latest()->limit(3)->get(),
        ]);
    }

    public function perangkatDesa()
    {
        return view('landing.perangkatDesa.index', [
            'perangkatDesa' => PerangkatDesa::orderBy('jabatan', 'asc')->get()
        ]);
    }

    public function galeri()
    {
        return view('landing.galeri.index', [
            'dataGaleri' => Galeri::where('status', 'Public')->latest()->paginate(12),
        ]);
    }

    public function strukturOrganisasi(Request $request)
    {
        if ($request->query('data') != null) {
            $data = $request->query('data');
        } else {
            $data = 0;
        }
        return view('landing.strukturDesa.index', [
            'datas' => PerangkatDesa::orderBy('jabatan', 'asc')->get(),
            'item' => PerangkatDesa::where('jabatan', $data)->get()->first()
        ]);
    }
}
