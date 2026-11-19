<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataService extends Model
{
    protected $table = 'data_service';

    protected $fillable = [
        'id_servis_pelanggan',
        'estimasi_service',
        'nama_mekanik',
        'sparepart_pengganti',
    ];

    protected $casts = [
        'estimasi_service' => 'decimal:2',
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