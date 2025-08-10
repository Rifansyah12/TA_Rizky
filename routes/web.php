<?php

use App\Http\Controllers\EkstrakulikulerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\AdminPendaftaranController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasJadwalController;
use App\Http\Controllers\KontenController;
use App\Http\Controllers\MenuPendaftaranController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\AgendaController;

// cms
use App\Http\Controllers\Admin\CMS\CmsGaleriController;
use App\Http\Controllers\Admin\CMS\CmsArtikelController;
use App\Http\Controllers\Admin\CMS\CmsKegiatanController;
use App\Http\Controllers\Admin\CMS\CmsAgendaController;
use App\Http\Controllers\Admin\CMS\CmsPrestasiController;
use App\Http\Controllers\Admin\CMS\CmsEkstrakurikulerController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\ArtikelController; 
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\AIController;
use App\Http\Controllers\CalisAuthController;
use App\Http\Controllers\admin\DashboardadminController;


Route::get('/', [WelcomeController::class, 'index']);
Route::match(['get', 'post'], '/ai-ask', [AiController::class, 'tanya']);
Route::get('/footer', [FooterController::class, 'index']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });
});


// Login Calis
Route::get('/login-calis', [CalisAuthController::class, 'showLogin'])->name('LoginCalis');
Route::post('/login-calis', [CalisAuthController::class, 'login']);

Route::get('/register-calis', [CalisAuthController::class, 'showRegister'])->name('RegisterCalis');
Route::post('/register-calis', [CalisAuthController::class, 'register']);

Route::post('/logout-calis', [CalisAuthController::class, 'logout'])->name('LogoutCalis');

// Route pendaftaran (hanya bisa diakses jika sudah login calis)
Route::middleware('auth:calis')->group(function() {
    Route::get('/pendaftaran', function() {
        return view('pendaftaran.index');  // view form pendaftaran calon siswa
    })->name('pendaftaran.index');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel');
Route::get('/artikel/{id}', [ArtikelController::class, 'show'])->name('artikel.show');
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');

Route::get('/admin/dashboard', [DashboardadminController::class, 'index'])->name('admin.dashboard');
// Admin_pendaftaran
Route::get('/admin/pendaftaran', [AdminPendaftaranController::class, 'index'])->name('kelola_pendaftaran.index');
Route::put('/admin/kelola-pendaftaran/konfirmasi/{id}', [AdminPendaftaranController::class, 'konfirmasi'])->name('kelola_pendaftaran.konfirmasi');
Route::delete('/kelola_pendaftaran/{id}', [AdminPendaftaranController::class, 'hapus'])->name('kelola_pendaftaran.hapus');


// pendaftaran
Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran.index');

// Route::get('/pendaftaran', [PendaftaranController::class, 'create'])->name('pendaftaran.create'); 
Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store'); // proses form

// Siswa
Route::get('/admin/management_siswa', [SiswaController::class, 'index'])->name('management_siswa.index');
Route::post('/management_siswa', [SiswaController::class, 'store'])->name('management_siswa.store');
Route::put('/management_siswa/{id}', [SiswaController::class, 'update'])->name('management_siswa.update');
Route::delete('/management_siswa/{id}', [SiswaController::class, 'destroy'])->name('management_siswa.destroy');


// Guru
Route::get('/admin/management_guru', [GuruController::class, 'index'])->name('management_guru.index');
Route::resource('management_guru', GuruController::class);

// kelas dan jadwal
Route::get('/admin/management_kelas_jadwal', [KelasJadwalController::class, 'index'])->name('management_kelas_jadwal.index');
Route::resource('jadwal', KelasJadwalController::class);


// Kontent
// Halaman utama CMS
Route::get('admin/cms', function () {
    return view('admin.cms.layouts'); // Layout CMS utama
})->name('cms.layouts');

// cms
Route::prefix('admin/cms')->name('cms.')->group(function () {
    // Galeri
    Route::get('/galeri', [CmsGaleriController::class, 'index'])->name('galeri.index');
    Route::post('/galeri', [CmsGaleriController::class, 'store'])->name('galeri.store');
    Route::put('/galeri/{galeri}', [CmsGaleriController::class, 'update'])->name('galeri.update');
    Route::delete('/galeri/{galeri}', [CmsGaleriController::class, 'destroy'])->name('galeri.destroy');
    // Artikel
    Route::get('/artikel', [CmsArtikelController::class, 'index'])->name('artikel.index');
    Route::post('/artikel', [CmsArtikelController::class, 'store'])->name('artikel.store');
    Route::put('/artikel/{artikel}', [CmsArtikelController::class, 'update'])->name('artikel.update');
    Route::delete('/artikel/{artikel}', [CmsArtikelController::class, 'destroy'])->name('artikel.destroy');

    // Agenda
    Route::get('/agenda', [CmsAgendaController::class, 'index'])->name('agenda.index');
    Route::post('/agenda', [CmsAgendaController::class, 'store'])->name('agenda.store');
    Route::put('/agenda/{agenda}', [CmsAgendaController::class, 'update'])->name('agenda.update');
    Route::delete('/agenda/{agenda}', [CmsAgendaController::class, 'destroy'])->name('agenda.destroy');
    // Kegiatan
    Route::get('/kegiatan', [CmsKegiatanController::class, 'index'])->name('kegiatan.index');
    Route::post('/kegiatan', [CmsKegiatanController::class, 'store'])->name('kegiatan.store');
    Route::put('/kegiatan/{kegiatan}', [CmsKegiatanController::class, 'update'])->name('kegiatan.update');
    Route::delete('/kegiatan/{kegiatan}', [CmsKegiatanController::class, 'destroy'])->name('kegiatan.destroy');

    // Prestasi
    Route::get('/prestasi', [CmsPrestasiController::class, 'index'])->name('prestasi.index');
    Route::post('/prestasi', [CmsPrestasiController::class, 'store'])->name('prestasi.store');
    Route::put('/prestasi/{prestasi}', [CmsPrestasiController::class, 'update'])->name('prestasi.update');
    Route::delete('/prestasi/{prestasi}', [CmsPrestasiController::class, 'destroy'])->name('prestasi.destroy');
    // Ekstrakurikuler

    Route::get('/ekstrakurikuler', [CmsEkstrakurikulerController::class, 'index'])->name('ekstrakurikuler.index');
    Route::post('/ekstrakurikuler', [CmsEkstrakurikulerController::class, 'store'])->name('ekstrakurikuler.store');
    Route::put('/ekstrakurikuler/{ekstrakurikuler}', [CmsEkstrakurikulerController::class, 'update'])->name('ekstrakurikuler.update');
    Route::delete('/ekstrakurikuler/{ekstrakurikuler}', [CmsEkstrakurikulerController::class, 'destroy'])->name('ekstrakurikuler.destroy');

});




Route::get('/profil', [ProfileController::class, 'index'])->name('profil');
Route::get('/menupendaftaran', [MenuPendaftaranController::class, 'index'])->name('menupendaftaran');
Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda');
Route::get('/Kegiatan', [KegiatanController::class, 'index'])->name('kegiatan');
Route::get('/prestasi', [PrestasiController::class, 'index'])->name('prestasi');
Route::get('/ekstrakulikuler', [EkstrakulikulerController::class, 'index'])->name('ekstrakulikuler');