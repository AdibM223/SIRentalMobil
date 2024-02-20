<?php

use App\Http\Controllers\tarifController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\FungsiPelangganController;
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

//-----------------------------------DASHBOARD--------------------------------------------------
Route::get('/', [DetailController::class, 'loginuser'])->name('loginAdmin');


Route::get('/preload', [LoginController::class, 'preloadakun'])->name('preload');

Route::post('actionpreload', [LoginController::class, 'actionpreload'])->name('actionpreload');

Route::post('actionloginPelanggan', [LoginController::class, 'actionloginPelanggan'])->name('actionloginPelanggan');
Route::get('actionlogoutPelanggan', [LoginController::class, 'actionlogoutPelanggan'])->name('actionlogoutPelanggan');


Route::post('actionloginAdmin', [LoginController::class, 'actionloginAdmin'])->name('actionloginAdmin');
Route::get('actionlogoutAdmin', [LoginController::class, 'actionlogoutAdmin'])->name('actionlogoutAdmin');

Route::get('/Master/Pelanggan/tambahpelanggan', [PelangganController::class, 'pelanggantambah'])->name('Admin');
Route::post('/Master/Pelanggan/inputpelanggan', [PelangganController::class, 'actionpelanggan'])->name('Admin');


//ADMIN
Route::get('/Admin/dashboard', [DetailController::class, 'DashboardAdmin'])->name('dashboardadmin')->middleware('Admin');
// ------------------------------------MOBIL----------------------------------------------------
Route::get('/Admin/Mobil', [MobilController::class, 'indexmobil'])->middleware('Admin');
Route::get('/Master/Mobil/Tambahmobil', [MobilController::class, 'mobiltambah'])->middleware('Admin');
Route::post('/Master/Mobil/inputmobil', [MobilController::class, 'actionmobil'])->middleware('Admin');
Route::get('/Master/Mobil/hapusmobil/{id}', [MobilController::class, 'deletemobil'])->middleware('Admin');

Route::get('/Master/Mobil/rubahmobil/{id}', [MobilController::class, 'mobilupdate'])->middleware('Admin');
Route::post('/Master/Mobil/updatemobil', [MobilController::class, 'actionmobilupdate'])->middleware('Admin');



// ------------------------------------TARIF----------------------------------------------------
Route::get('/Admin/Tarif', [MobilController::class, 'indextarif'])->middleware('Admin');
Route::get('/Master/Tarif/Tambahtarif', [tarifController::class, 'tariftambah'])->middleware('Admin');
Route::post('/Master/Tarif/inputtarif', [tarifController::class, 'actiontarif'])->middleware('Admin')->name('actiontarif');
Route::get('/Master/Tarif/hapustarif/{id}', [tarifController::class, 'deletetarif'])->middleware('Admin');
Route::get('/Master/Tarif/rubahtarif/{id}', [tarifController::class, 'tarifupdate'])->middleware('Admin');
Route::post('/Master/Tarif/updatetarif', [tarifController::class, 'actiontarifupdate'])->middleware('Admin');



// -----------------------------------PELANGGAN------------------------------------------------
Route::get('/Admin/Pelanggan', [PelangganController::class, 'indexpelanggan'])->middleware('Admin');
Route::get('/Admin/Admins', [PelangganController::class, 'indexadmin'])->middleware('Admin');
Route::get('/Master/Pelanggan/hapuspelanggan/{id}', [PelangganController::class, 'pelanggandelete'])->middleware('Admin');

Route::get('/Master/Admin/hapusadmin/{id}', [PelangganController::class, 'admindelete'])->middleware('Admin');

Route::get('/Master/Pelanggan/hapuspelanggan/{id}', [PelangganController::class, 'pelanggandelete'])->middleware('Admin');
Route::get('/Master/Pelanggan/rubahpelanggan/{id}', [PelangganController::class, 'pelangganupdate'])->middleware('Admin');
Route::post('/Master/Pelanggan/updatepelanggan', [PelangganController::class, 'actionpelangganupdate'])->middleware('Admin');


// ------------------------------------DETAIL----------------------------------------------------
Route::get('/Admin/Penyewaan', [DetailController::class, 'indexpenyewaan'])->name('dashadmin')->middleware('Admin');
Route::get('/Admin/Pembayaran', [DetailController::class, 'indexpembayaran'])->middleware('Admin');
Route::get('/Admin/Pengembalian', [DetailController::class, 'indexpengembalian'])->middleware('Admin');


// ------------------------------------LAPORAN----------------------------------------------------
Route::get('/Admin/LaporanTransaksi', [DetailController::class, 'LapTransaksi'])->middleware('Admin');
Route::get('/laptransaksi/cetaklaporan/{search2}', [DetailController::class, 'cetakLap'])->middleware('Admin');
Route::get('/Admin/LaporanMobil', [MobilController::class, 'indexlaporanmobil'])->middleware('Admin');
Route::get('/laptransaksi/cetaklaporanmobil/{search}', [DetailController::class, 'cetakLapMobil'])->middleware('Admin');
Route::get('/search', [MobilController::class, 'indexsearchlaporanmobil'])->middleware('Admin');
Route::get('/search2', [DetailController::class, 'indexsearchlaporantransaksi'])->middleware('Admin');
//PELANGGAN
Route::get('/Pelanggan/dashboard', [FungsiPelangganController::class, 'Dashboardpelanggan'])->name('dashboardPelanggan')->middleware('Pelanggan');
Route::get('/Pelanggan/pesanan/{id}', [FungsiPelangganController::class, 'detailpesanan'])->middleware('Pelanggan');
Route::get('/Pelanggan/daftarmobil', [FungsiPelangganController::class, 'daftarmobilpelanggan'])->middleware('Pelanggan');
Route::get('/Pelanggan/InputSewa/{id}/{idku}', [FungsiPelangganController::class, 'pelanggansewamobil'])->middleware('Pelanggan');
Route::post('/Pelanggan/Inputpenyewaanmobil', [FungsiPelangganController::class, 'actionsewamobil'])->middleware('Pelanggan');
Route::get('/Pelanggan/tambahdetailsewa/{id}', [FungsiPelangganController::class, 'pelangganupdatesewa'])->middleware('Admin');
Route::post('/admin/tambahdetail', [FungsiPelangganController::class, 'updateinfosewa'])->middleware('Admin');
Route::post('/admin/bataldetail', [FungsiPelangganController::class, 'batalinfosewa'])->middleware('Admin');

Route::get('/Pelanggan/tambahdetailbayar/{id}', [FungsiPelangganController::class, 'pelangganupdatebayar'])->middleware('Admin');
Route::post('/admin/tambahdetailbayar', [FungsiPelangganController::class, 'updateinfobayar'])->middleware('Admin');

Route::get('/Pelanggan/tambahdetailkembali/{id}', [FungsiPelangganController::class, 'pelangganupdatekembali'])->middleware('Admin');
Route::post('/admin/tambahdetailkembali', [FungsiPelangganController::class, 'updateinfokembali'])->middleware('Admin');

