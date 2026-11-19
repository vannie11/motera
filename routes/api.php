<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PelangganApiController;
use App\Http\Controllers\Api\KendaraanApiController;
use App\Http\Controllers\Api\DaftarServiceApiController;
use App\Http\Controllers\Api\DataServiceApiController;
use App\Http\Controllers\Api\PembayaranApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('pelanggan', PelangganApiController::class);
Route::apiResource('kendaraan', KendaraanApiController::class);
Route::apiResource('daftar-service', DaftarServiceApiController::class);
Route::apiResource('data-service', DataServiceApiController::class);
Route::apiResource('pembayaran', PembayaranApiController::class);