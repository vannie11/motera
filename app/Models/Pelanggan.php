<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_pelanggan',
        'nama_lengkap',
        'no_hp',
        'alamat_pelanggan',
        'pekerjaan',
    ];

    public function daftarServices()
    {
        return $this->hasMany(
            DaftarService::class,
            'id_pelanggan',
            'id_pelanggan'
        );
    }
}