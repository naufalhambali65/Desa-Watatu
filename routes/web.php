<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CMSController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ChangePassController;
use App\Http\Controllers\DataPendudukController;
use App\Http\Controllers\KatalogUMKMController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\PerangkatDesaController;
use App\Http\Controllers\LoginController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LandingController::class, 'index']);
Route::get('/berita', [LandingController::class, 'berita']);
Route::get('/berita/{berita}', [LandingController::class, 'detailBerita']);
Route::get('/galeri', [LandingController::class, 'galeri']);
Route::get('/perangkatDesa', [LandingController::class, 'perangkatDesa']);
Route::get('/strukturOrganisasi', [LandingController::class, 'strukturOrganisasi']);
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/admin', [CMSController::class, 'index'])->middleware('auth');
Route::get('/admin/berita/createSlug', [BeritaController::class, 'createSlug'])->middleware('auth');

Route::post('/admin/importData', [ImportController::class, 'importExcel'])->middleware('auth');

Route::resource('/admin/berita', BeritaController::class)->parameters([
    'berita' => 'berita'
])->middleware('auth');
Route::resource('/admin/katalog', KatalogUMKMController::class)->middleware('auth');
Route::resource('/admin/dataPenduduk', DataPendudukController::class)->middleware('auth');
Route::resource('/admin/galeri', GaleriController::class)->middleware('auth');
Route::resource('/admin/perangkatDesa', PerangkatDesaController::class)->middleware('auth');
Route::get('/admin/changePass', [ChangePassController::class, 'index'])->middleware('auth');
Route::post('/admin/changePass', [ChangePassController::class, 'changePass'])->middleware('auth');
