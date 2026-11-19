<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();

            $table->string('id_servis_pelanggan', 20)->unique();
            $table->decimal('jumlah_biaya_servis', 12, 2);
            $table->string('jenis_pembayaran', 20)->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('id_servis_pelanggan')
                ->references('id_servis_pelanggan')
                ->on('daftar_service')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};