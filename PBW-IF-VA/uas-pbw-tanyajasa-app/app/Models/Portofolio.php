<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function service()
    {
        return $this->belongsTo(Service::class);  // Relasi ke Service
    }

    public function provider()
    {
        return $this->belongsTo(User::class, 'provider_id'); // Relasi ke Penyedia Jasa
    }
}
