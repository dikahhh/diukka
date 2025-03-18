<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang digunakan model ini.
     */
    protected $table = 'booking';

    /**
     * Kolom yang dapat diisi melalui form (mass assignable).
     */
    protected $fillable = [
        'keluhan',
        'cabang',
        'tempat',
        'tanggal',
        'kendaraan',
        'ktp',
        'no_antrian',
        'status',
        'waktu',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'ktp', 'ktp');
    }
    public function riwayat()
    {
        return $this->hasOne(Riwayat::class, 'booking_id');
    }
}
