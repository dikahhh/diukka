<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    // Karena nama tabel tidak mengikuti konvensi 'services', 
    // kita set secara manual nama tabelnya.
    protected $table = 'service';

    protected $fillable = [
        'jenis_service',
        'harga',
    ];
}
