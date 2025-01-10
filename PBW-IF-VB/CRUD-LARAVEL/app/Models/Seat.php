<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    protected $fillable = ['jenis_seat', 'harga'];

    public function konser()
    {
        return $this->belongsTo(Konser::class);
    }
}
