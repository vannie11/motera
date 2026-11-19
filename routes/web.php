
<?php

use Illuminate\Support\Facades\Route;
use App\Models\Pelanggan;
use App\Models\Kendaraan;
use App\Models\DaftarService;
use App\Models\DataService;
use App\Models\Pembayaran;

Route::get('/', function () {

    // STATISTIK UTAMA
    $totalPelanggan = Pelanggan::count();
    $totalKendaraan = Kendaraan::count();
    $totalService = DaftarService::count();
    $totalPembayaran = Pembayaran::count();

    // RINGKASAN KEUANGAN
    $totalPendapatan = Pembayaran::sum('jumlah_biaya_servis');

    // STATUS SERVICE
    $serviceBelumDikerjakan = DaftarService::whereDoesntHave('dataService')
        ->count();

    $serviceMenungguPembayaran = DaftarService::whereHas('dataService')
        ->whereDoesntHave('pembayaran')
        ->count();

    $serviceSelesai = DaftarService::whereHas('pembayaran')
        ->count();

    // TOTAL DATA PENGERJAAN
    $totalDataService = DataService::count();

    // AKTIVITAS SERVICE TERBARU
    $recentServices = DaftarService::with([
        'pelanggan',
        'kendaraan',
        'dataService',
        'pembayaran'
    ])
        ->orderByDesc('tanggal_servis')
        ->orderByDesc('id_servis_pelanggan')
        ->take(5)
        ->get();

    return view('dashboard', compact(
        'totalPelanggan',
        'totalKendaraan',
        'totalService',
        'totalPembayaran',
        'totalPendapatan',
        'serviceBelumDikerjakan',
        'serviceMenungguPembayaran',
        'serviceSelesai',
        'totalDataService',
        'recentServices'
    ));

})->name('dashboard');


Route::resource('pelanggan', \App\Http\Controllers\PelangganController::class);

Route::resource('kendaraan', \App\Http\Controllers\KendaraanController::class);

Route::resource('daftar-service', \App\Http\Controllers\DaftarServiceController::class);

Route::resource('data-service', \App\Http\Controllers\DataServiceController::class);

Route::resource('pembayaran', \App\Http\Controllers\PembayaranController::class);
