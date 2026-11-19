<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaftarService extends Model
{
    protected $table = 'daftar_service';
    protected $primaryKey = 'id_servis_pelanggan';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_servis_pelanggan',
        'no_plat_kendaraan',
        'id_pelanggan',
        'keluhan_kendaraan',
        'tanggal_servis',
    ];

    protected $casts = [
        'tanggal_servis' => 'date',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(
            Pelanggan::class,
            'id_pelanggan',
            'id_pelanggan'
        );
    }

    public function kendaraan()
    {
        return $this->belongsTo(
            Kendaraan::class,
            'no_plat_kendaraan',
            'no_plat_kendaraan'
        );
    }

    public function dataService()
    {
        return $this->hasOne(
            DataService::class,
            'id_servis_pelanggan',
            'id_servis_pelanggan'
        );
    }

    public function pembayaran()
    {
        return $this->hasOne(
            Pembayaran::class,
            'id_servis_pelanggan',
            'id_servis_pelanggan'
        );
    }
}