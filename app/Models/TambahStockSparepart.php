<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TambahStockSparepart extends Model
{
    use HasFactory;

    // Nama tabel sesuai dengan migration
    protected $table = 'tambah_stock_spareparts';

    // Field yang dapat diisi secara massal
    protected $fillable = [
        'sparepart_id',
        'quantity',
        'keterangan',
        'user_id',
    ];

    // Relasi ke Sparepart
    public function sparepart()
    {
        return $this->belongsTo(Sparepart::class);
    }

    // Relasi ke User (operator)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
