<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crud extends Model
{
    use HasFactory;

    protected $fillable = ['Foto_Identitas','Alamat_Email', 'no_HP','Nama_Lengkap', 'Seat'];
    protected $table = 'crud';
    public $timestamps = false;

    // Define the relationship to Konser
    public function konser()
    {
        return $this->belongsTo(Konser::class);
    }

    // Define the relationship to Seat
    public function seat()
    {
        return $this->belongsTo(Seats::class);
    }
}
