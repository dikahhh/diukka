<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sparepart extends Model
{
    protected $table = 'sparepart';

    protected $fillable = [
        'nama', 
        'stock', 
        'image',
        'deskripsi',
        'harga',
    ];

    public function riwayats()
    {
        return $this->belongsToMany(Riwayat::class, 'riwayat_sparepart')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }
}
