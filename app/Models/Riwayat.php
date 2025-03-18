<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    protected $table = 'riwayat';

    protected $fillable = [
        'jenis_service',
        'keluhan',
        'cabang',
        'tempat',
        'tanggal',
        'no_antrian',
        'ktp',
        'kendaraan',
        'karyawan_id',  
        'catatan',
        'harga',
        'dana_tambahan',
        'dana_tambahan_deskripsi',
        'harga_service'
    ];

    public function spareparts()
    {
        return $this->belongsToMany(Sparepart::class, 'riwayat_sparepart')
            ->withPivot('quantity')
            ->withTimestamps();
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
