<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'nama_buku',
        'nama_penulis',
        'tahun_terbit',
        'sinopsis',
        'foto'
    ];
}
