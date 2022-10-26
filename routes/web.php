<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\General;
use App\Http\Controllers\Home;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\MateriTertulisController;
use App\Http\Controllers\MateriVideoControler;
use App\Http\Controllers\MateriVideoController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PelajaranController;
use App\Http\Controllers\Penilai;
use App\Http\Controllers\PesertaPelajaranController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::post('/postlogin', [LoginController::class, 'postLogin']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/', [Home::class, 'beranda']);
Route::get('/kategori/{id_kategori}', [Home::class, 'beranda']);
Route::get('/detail_pelajaran/{id_pelajaran}', [Home::class, 'detailPelajaran']);

Route::get('/tentang_aplikasi', [Home::class, 'tentangAplikasi']);


Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
});

// GENERAL CONTROLLER ROUTE
Route::group(['middleware' => ['auth', 'ceklevel:Administrator,dosen,mahasiswa']], function () {

    Route::get('/dashboard', [General::class, 'dashboard']);
    Route::get('/profile', [General::class, 'profile']);
    Route::get('/bantuan', [General::class, 'bantuan']);

    Route::post('/ubah_foto_profile', [General::class, 'ubahFotoProfile']);
    Route::post('/ubah_role', [General::class, 'ubahRole']);
});

// ADMIN ROUTE
Route::group(['middleware' => ['auth', 'ceklevel:mahasiswa']], function () {
    Route::get('/keranjang', [KeranjangController::class, 'index']);
    Route::get('/keranjang/hapus/{id_keranjang}/{jml_buku}', [KeranjangController::class, 'delete']);
    Route::get('/my_account', [UserController::class, 'myAccount']);
    Route::get('/pelajaran_terdaftar', [UserController::class, 'pelajaranTerdaftar']);
    Route::get('/pelajaran_saya', [UserController::class, 'pelajaranSaya']);
    Route::get('/materi/{id_pelajaran}', [UserController::class, 'materi']);
    Route::get('/materi_video/{id_pelajaran}', [UserController::class, 'materiVideo']);
    Route::get('/materi_tertulis/{id_pelajaran}', [UserController::class, 'materiTertulis']);
    Route::get('/virtual_coding/{id_pelajaran}', [UserController::class, 'virtualCoding']);
    Route::get('/quiz/{id_pelajaran}', [UserController::class, 'quiz']);
    Route::post('/daftar_ke_pelajaran', [PesertaPelajaranController::class, 'store']);
});


// ADMIN ROUTE
Route::group(['middleware' => ['auth', 'ceklevel:Administrator,dosen']], function () {


    Route::group(['prefix' => 'dosen'], function () {
        // GET REQUEST
        Route::get('/pengguna', [Admin::class, 'pengguna']);
        Route::get('/fetch_data', [Admin::class, 'fetchData']);
        Route::get('/peserta', [DosenController::class, 'peserta']);
        Route::get('/peserta/{id_pelajaran}', [DosenController::class, 'pesertaPelajaran']);
        Route::get('/terima_peserta/{id_peserta_pelajaran}', [DosenController::class, 'terimaPeserta']);
        Route::get('/tolak_peserta/{id_peserta_pelajaran}', [DosenController::class, 'tolakPeserta']);
        Route::get('/batalkan_peserta/{id_peserta_pelajaran}', [DosenController::class, 'batalkanPeserta']);
        Route::get('/materi_video', [DosenController::class, 'MateriVideo']);
        Route::get('/materi_tertulis', [DosenController::class, 'MateriTertulis']);
        Route::get('/quiz', [DosenController::class, 'quiz']);
        Route::get('/quiz/{id_pelajaran}', [DosenController::class, 'dataQuiz']);
        Route::get('/soal/{id_quiz}', [DosenController::class, 'soal']);
        Route::get('/data_materi_video/{id_pelajaran}', [DosenController::class, 'dataMateriVideo']);
        Route::get('/data_materi_tertulis/{id_pelajaran}', [DosenController::class, 'dataMateriTertulis']);

        // CRUD MATERI SOAL
        Route::post('/create_soal', [QuizController::class, 'store']);
        Route::post('/update_soal', [QuizController::class, 'update']);
        Route::get('/delete_soal/{id_quiz}', [QuizController::class, 'delete']);

        // CRUD MATERI QUIZ
        Route::post('/create_quiz', [QuizController::class, 'store']);
        Route::post('/update_quiz', [QuizController::class, 'update']);
        Route::get('/delete_quiz/{id_quiz}', [QuizController::class, 'delete']);

        // CRUD MATERI VIDEO
        Route::post('/create_materi_video', [MateriVideoController::class, 'store']);
        Route::post('/update_materi_video', [MateriVideoController::class, 'update']);
        Route::get('/delete_materi_video/{id_materi_video}', [MateriVideoController::class, 'delete']);

        // CRUD MATERI TERTULIS
        Route::post('/create_materi_tertulis', [MateriTertulisController::class, 'store']);
        Route::post('/update_materi_tertulis', [MateriTertulisController::class, 'update']);
        Route::get('/delete_materi_tertulis/{id_materi_tertulis}', [MateriTertulisController::class, 'delete']);

        // CRUD KATEGORI
        Route::get('/mahasiswa', [MemberController::class, 'index']);
        Route::post('/create_member', [MemberController::class, 'store']);
        Route::post('/update_member', [MemberController::class, 'update']);
        Route::post('/delete_member', [MemberController::class, 'delete']);

        // CRUD PELAJARAN
        Route::get('/pelajaran', [PelajaranController::class, 'index']);
        Route::post('/create_pelajaran', [PelajaranController::class, 'store']);
        Route::post('/update_pelajaran', [PelajaranController::class, 'update']);
        Route::post('/delete_pelajaran', [PelajaranController::class, 'delete']);

        // CRUD KATEGORI
        Route::get('/kategori', [KategoriController::class, 'index']);
        Route::post('/create_kategori', [KategoriController::class, 'store']);
        Route::post('/update_kategori', [KategoriController::class, 'update']);
        Route::post('/delete_kategori', [KategoriController::class, 'delete']);

        // CRUD BUKU
        Route::get('/buku', [BukuController::class, 'index']);
        Route::post('/create_buku', [BukuController::class, 'store']);
        Route::post('/update_buku', [BukuController::class, 'update']);
        Route::post('/delete_buku', [BukuController::class, 'delete']);

        // CRUD PENGGUNA
        Route::post('/create_pengguna', [Admin::class, 'createPengguna']);
        Route::post('/update_pengguna', [Admin::class, 'updatePengguna']);
        Route::post('/delete_pengguna', [Admin::class, 'deletePengguna']);
    });
});



// ADMIN ROUTE
Route::group(['middleware' => ['auth', 'ceklevel:Administrator,dosen']], function () {
    Route::group(['prefix' => 'admin'], function () {
        // GET REQUEST
        Route::get('/pengguna', [Admin::class, 'pengguna']);
        Route::get('/fetch_data', [Admin::class, 'fetchData']);
        Route::get('/kelas', [Admin::class, 'kelas']);
        Route::get('/pinjamkan', [Admin::class, 'pinjamkan']);
        Route::get('/pinjamkan/{id_user}', [Admin::class, 'pinjamkanBuku']);
        Route::get('/kembalikan/{id_user}', [Admin::class, 'kembalikanBuku']);
        Route::get('/pengembalian', [Admin::class, 'pengembalian']);

        // CRUD KATEGORI
        Route::get('/mahasiswa', [MemberController::class, 'index']);
        Route::post('/create_member', [MemberController::class, 'store']);
        Route::post('/update_member', [MemberController::class, 'update']);
        Route::post('/delete_member', [MemberController::class, 'delete']);

        // CRUD KATEGORI
        Route::get('/kategori', [KategoriController::class, 'index']);
        Route::post('/create_kategori', [KategoriController::class, 'store']);
        Route::post('/update_kategori', [KategoriController::class, 'update']);
        Route::post('/delete_kategori', [KategoriController::class, 'delete']);

        // CRUD BUKU
        Route::get('/buku', [BukuController::class, 'index']);
        Route::post('/create_buku', [BukuController::class, 'store']);
        Route::post('/update_buku', [BukuController::class, 'update']);
        Route::post('/delete_buku', [BukuController::class, 'delete']);

        // CRUD PENGGUNA
        Route::post('/create_pengguna', [Admin::class, 'createPengguna']);
        Route::post('/update_pengguna', [Admin::class, 'updatePengguna']);
        Route::post('/delete_pengguna', [Admin::class, 'deletePengguna']);
    });
});
