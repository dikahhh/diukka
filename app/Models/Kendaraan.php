<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang digunakan model ini.
     */
    protected $table = 'kendaraan';

    /**
     * Kolom yang dapat diisi melalui form (mass assignable).
     */
    protected $fillable = [
        'no_plat',
        'merk',
        'tipe',
        'no_mesin',
        'transmisi',
        'tahun',
        'ktp',
        'cc',
    ];

    /**
     * Relasi dengan model User (berdasarkan kolom KTP).
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'ktp', 'ktp');
    }
}
