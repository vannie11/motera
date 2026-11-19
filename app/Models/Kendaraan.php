<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $table = 'kendaraan';
    protected $primaryKey = 'no_plat_kendaraan';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'no_plat_kendaraan',
        'jenis_kendaraan',
        'no_stnk',
        'tahun_pembuatan_kendaraan',
        'nama_pemilik',
        'warna_kendaraan',
    ];

    public function daftarServices()
    {
        return $this->hasMany(
            DaftarService::class,
            'no_plat_kendaraan',
            'no_plat_kendaraan'
        );
    }
}