<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';

    protected $fillable = [
        'nama', 
        'email', 
        'umur', 
        'alamat', 
        'no_telp', 
        'image', 
        'gender'
    ];

    public function riwayats()
    {
        return $this->hasMany(Riwayat::class);
    }
}
