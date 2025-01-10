<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konser extends Model
{
    use HasFactory;

    protected $table = 'konser'; // Nama tabel di database

    protected $fillable = [
        
        'nama_konser',
        'tanggal',
        'lokasi',
    ];
}
