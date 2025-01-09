<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    protected $casts = [
        'start_date' => 'date',
        'deadline' => 'date', // Tambahkan ini
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function provider()
    {
        return $this->belongsTo(User::class, 'provider_id'); // Relasi provider_id
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id'); // Relasi ke layanan
    }
}
