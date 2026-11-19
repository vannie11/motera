<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';

    protected $fillable = [
        'id_servis_pelanggan',
        'jumlah_biaya_servis',
        'jenis_pembayaran',
        'keterangan',
    ];

    protected $casts = [
        'jumlah_biaya_servis' => 'decimal:2',
    ];

    public function daftarService()
    {
        return $this->belongsTo(
            DaftarService::class,
            'id_servis_pelanggan',
            'id_servis_pelanggan'
        );
    }
}