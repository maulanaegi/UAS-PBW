<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'location', 'description', 'price', 'rating', 'image', 'category'];

    // public function reviews()
    // {
    //     return $this->hasMany(Review::class);
    // }
}
