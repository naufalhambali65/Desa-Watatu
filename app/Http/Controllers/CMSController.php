<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\KatalogUMKM;
use App\Models\DataPenduduk;
use App\Models\PerangkatDesa;
use App\Models\Galeri;

class CMSController extends Controller
{
    public function index()
    {
        return view('cms.index', [
            'title' => 'Dashboard',
            'berita' => Berita::all()->count(),
            'katalog' => KatalogUMKM::all()->count(),
            'dataPenduduk' => DataPenduduk::all()->count(),
            'perangkatDesa' => PerangkatDesa::all()->count(),
            'galeri' => Galeri::all()->count(),
        ]);
    }
}