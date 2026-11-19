<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kendaraan', function (Blueprint $table) {
            $table->string('no_plat_kendaraan', 20)->primary();
            $table->string('jenis_kendaraan', 30);
            $table->string('no_stnk', 50);
            $table->year('tahun_pembuatan_kendaraan');
            $table->string('nama_pemilik');
            $table->string('warna_kendaraan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kendaraan');
    }
};