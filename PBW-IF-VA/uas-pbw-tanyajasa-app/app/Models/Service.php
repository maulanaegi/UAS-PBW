<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Service extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = ["id"];

    public function user()
    {
        return $this->belongsTo(User::class, 'provider_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['name', 'providerName'],
                'separator' => '-',
            ]
        ];
    }

    public function getProviderNameAttribute()
    {
        // Ambil nama provider dari relasi
        return $this->provider->name;
    }

    public function provider()
    {
        return $this->belongsTo(User::class, 'provider_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function portofolios()
    {
        return $this->hasMany(Portofolio::class);
    }
}
