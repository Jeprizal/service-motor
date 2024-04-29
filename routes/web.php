<?php

use App\Http\Controllers\LayananController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BeritaDashboardController;
use App\Http\Controllers\PdfController;
// use App\Http\Controllers\KategoriDashboardController;
use App\Http\Controllers\ProdukDashboardController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\ProdukMemberController;
use App\Http\Controllers\TransaksiDashboardController;
use App\Http\Controllers\BeritaMemberController;
use App\Http\Controllers\SettingMemberController;
use App\Http\Controllers\HomeMemberController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\DaerahController;
use App\Http\Controllers\ProdukController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/download-pdf/{id}', [PdfController::class, 'downloadPdf'])->name('download.pdf');

Route::resource('home', HomeMemberController::class);
Route::resource('berita', BeritaController::class);
Route::resource('produk', ProdukController::class);
Route::resource('daftar', SignupController::class)->middleware('guest');
// ->parameter('produk-dashboard','produk')

Route::group(['middleware' => ['auth', 'level:ADMIN']], function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    });
    Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
    Route::get('/payment/create', [PaymentController::class, 'create'])->name('payment.create');
    Route::post('/payment/create', [PaymentController::class, 'store'])->name('payment.store');
    Route::get('/payment/{id}/edit', [PaymentController::class, 'edit'])->name('payment.edit');
    // Route::put('/payment/{id}/edit', [PaymentController::class, 'update'])->name('payment.update');

    Route::get('/layanan', [LayananController::class, 'index'])->name('layanan');
    Route::get('/layanan/create', [LayananController::class, 'create'])->name('layanan.create');
    Route::post('/layanan/create', [LayananController::class, 'store'])->name('layanan.store');
    Route::get('/layanan/{id}/edit', [LayananController::class, 'edit'])->name('layanan.edit');
    Route::delete('/layanan/{id}', [LayananController::class, 'destroy'])->name('layanan.delete');

    Route::resource('/transaksi', TransaksiDashboardController::class);
    Route::put('produk-transaksi/{id}/update', [TransaksiDashboardController::class, 'update'])->name('transaksi.update');


    Route::resource('berita-dashboard', BeritaDashboardController::class);
    // Route::resource('kategori-dashboard', KategoriDashboardController::class);
    Route::resource('produk-dashboard', ProdukDashboardController::class);
    Route::resource('user-dashboard', UserDashboardController::class);

});
Route::group(['middleware' => ['auth', 'level:MEMBER']], function () {
    Route::get('/member', function () {
        return view('member.dashboard.index');
    });
    Route::resource('produk-member', ProdukMemberController::class);
    Route::resource('produk-transaksi-member', TransaksiDashboardController::class);
    // Route::put('produk-transaksi-member/{id}/paid', [TransaksiDashboardController::class, 'paid'])->name('transaksi.paid');
    route::put('/transaksi/{id}/paid', [TransaksiDashboardController::class, 'paid'])->name('transaksi.paid');
    Route::resource('berita-member', BeritaMemberController::class);
    Route::resource('user-member', SettingMemberController::class);
});
